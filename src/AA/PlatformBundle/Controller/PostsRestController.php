<?php

namespace AA\PlatformBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AA\PlatformBundle\Entity\Posts;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\FOSRestController;

Class PostsRestController extends FOSRestController
{
    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get All posts",
     *  statusCodes={
     *    200="HTTP_OK : Returned when successful",
     *    204="HTTP_NO_CONTENT : Returned when successful but no data",
     *    206="HTTP_PARTIAL_CONTENT : Return when successful but it's the last recordings"
     *  },
     *  tags={
     *    "stable" = "#5e8014"
     *  },
     *  parameters={
     *    {
     *      "name": "limit",
     *      "dataType": "Integer",
     *      "required": "False",
     *      "description": "The number of results returned",
     *    },
     *    {
     *      "name": "offset",
     *      "dataType": "Integer",
     *      "required": "False",
     *      "description": "Number start on record"
     *    }
     *  }
     * )
     * @param Request $request
     * @return array
     */
    public function getPostsAction(Request $request)
    {
        // Set limit | default = 5
        $limit = $request->get('limit') ? $request->get('limit') : 5;
        // Set offset | default = 0
        $offset = $request->get('offset') ? $request->get('offset') : 0;

        $posts = $this->getDoctrine()
            ->getRepository("AAPlatformBundle:Posts")
            ->findBy(
                array(),
                array(),
                $limit,
                $offset
            );
        // 206 :: HTTP_PARTIAL_CONTENT
        if (0 < count($posts) && count($posts) < $limit) {
            return  $this->view($posts, Response::HTTP_PARTIAL_CONTENT);
        }
        // 204 :: HTTP_NO_CONTENT
        if (!$posts) {
            return  $this->view($posts, Response::HTTP_NO_CONTENT);
        }
        // 202 :: HTTP_OK
        return  $this->view($posts, Response::HTTP_OK);
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get Posts by id",
     *  statusCodes={
     *    200="HTTP_OK : Returned when successful",
     *    204="HTTP_NO_CONTENT : Returned when successful but no data",
     *    206="HTTP_PARTIAL_CONTENT : Return when successful but it's the last recordings"
     *  },
     *  tags={
     *    "stable" = "#5e8014"
     *  },
     *  requirements={
     *    {
     *      "name"="id",
     *      "dataType"="Integer",
     *      "requirement"="\d+",
     *      "description"="Id of advert"
     *    },
     *    {
     *      "name"="_format",
     *      "dataType"="String",
     *      "requirement"="xml|json|html",
     *      "description"="Request format"
     *    },
     *  }
     * )
     */
    public function getPostAction($id)
    {
        if(is_numeric($id)){

            $post = $this->getDoctrine()
                ->getRepository("AAPlatformBundle:Posts")
                ->find($id);

            if(!$post){
                return $this->view(null, Response::HTTP_NO_CONTENT);
            }

            return $this->view($post, Response::HTTP_OK);

        }else{
            // 400 :: HTTP_BAD_REQUEST
            return  $this->view(null, Response::HTTP_BAD_REQUEST); 
        }
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Add new Posts",
     *  statusCodes={
     *    200="Ok : Returned when successful"
     *  },
     *  requirements={
     *    {
     *      "name"="request",
     *      "dataType"="Json",
     *      "requirement"="\d+",
     *      "description"="Posts Object"
     *    }
     *  },
     *  tags={
     *    "stable" = "#5e8014"
     *  }
     * )
     */

    public function postPostAction(Request $request)
    {
        
        $entity = $this->getDoctrine()->getManager();

        $post = new Posts();
        $post->setDate(new \DateTime($request->get('date')))
            ->setContent($request->get('content'))
            ->setTitle($request->get('title'))
            ->setStatus($request->get('status'))
            ->setCommentStatus($request->get('comment_status'))
            ->setDateModified(new \DateTime($request->get('date')))
            ->setIdUser($this->get('security.token_storage')->getToken()->getUser()->getId())
            ->setIdMenu($request->get('id_menu'))
            ->setIdType($request->get('id_type'))
            ->setIdCategory($request->get('id_category'));

        $entity->persist($post);
        $entity->flush();

        return $this->redirectToRoute('api_get_post',
            array('id' => $post->getId())
        );
        /*$securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->get('security.token_storage')->getToken()->getUser()->getId();
        }else{
            return null;
        }*/
        
    }

}

/*
    Exmple Posts :
    {
        "date":"2015-12-16 15:02:08",
        "title":"Hello world!",
        "content":"Welcome to PlatformBundle. This is your first post. Edit or delete it, then start writing!",
        "date_modified":"2015-12-16 15:02:09",
        "id_user": "1"
    }
*/