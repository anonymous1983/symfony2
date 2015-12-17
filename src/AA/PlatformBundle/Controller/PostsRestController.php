<?php

namespace AA\PlatformBundle\Controller;


use Doctrine\DBAL\DBALException;
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
     *    206="HTTP_PARTIAL_CONTENT : Return when successful but it's the last recordings",
     *    500="HTTP_INTERNAL_SERVER_ERROR : Return when you have server error"
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
        try {
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
                return $this->view($posts, Response::HTTP_PARTIAL_CONTENT);
            }
            // 204 :: HTTP_NO_CONTENT
            if (!$posts) {
                return $this->view($posts, Response::HTTP_NO_CONTENT);
            }
            // 202 :: HTTP_OK
            return $this->view($posts, Response::HTTP_OK);
        } catch (DBALException $exception) {
            // 500 :: HTTP_INTERNAL_SERVER_ERROR
            return $this->view(null, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get Posts by id",
     *  statusCodes={
     *    200="HTTP_OK : Returned when successful",
     *    204="HTTP_NO_CONTENT : Returned when successful but no data",
     *    206="HTTP_PARTIAL_CONTENT : Return when successful but it's the last recordings",
     *    500="HTTP_INTERNAL_SERVER_ERROR : Return when you have server error"
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
     * @param $id
     * @return \FOS\RestBundle\View\View
     */
    public function getPostAction($id)
    {
        try {
            if (is_numeric($id)) {

                $post = $this->getDoctrine()
                    ->getRepository("AAPlatformBundle:Posts")
                    ->find($id);

                if (!$post) {
                    return $this->view(null, Response::HTTP_NO_CONTENT);
                }

                return $this->view($post, Response::HTTP_OK);

            } else {
                // 400 :: HTTP_BAD_REQUEST
                return $this->view(null, Response::HTTP_BAD_REQUEST);
            }
        } catch (DBALException $exception) {
            // 500 :: HTTP_INTERNAL_SERVER_ERROR
            return $this->view(null, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Delete Posts by id",
     *  statusCodes={
     *    200="HTTP_OK : Returned when successful",
     *    204="HTTP_NO_CONTENT : Returned when successful but no data",
     *    206="HTTP_PARTIAL_CONTENT : Return when successful but it's the last recordings",
     *    500="HTTP_INTERNAL_SERVER_ERROR : Return when you have server error"
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
     * @param $id
     * @return \FOS\RestBundle\View\View
     */
    public function deletePostAction($id)
    {
        try {
            if (is_numeric($id)) {

                $entity = $this->getDoctrine()
                    ->getEntityManager();

                $repository = $entity->getRepository("AAPlatformBundle:Posts");

                $post = $repository->find($id);

                if (!$post) {
                    return $this->view(null, Response::HTTP_NO_CONTENT);
                } else {
                    $entity->remove($post);
                    $entity->flush();
                    return $this->view($post, Response::HTTP_OK);
                }

            } else {
                // 400 :: HTTP_BAD_REQUEST
                return $this->view(null, Response::HTTP_BAD_REQUEST);
            }
        } catch (DBALException $exception) {
            // 500 :: HTTP_INTERNAL_SERVER_ERROR
            return $this->view(null, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Update new Posts",
     *  statusCodes={
     *    200="Ok : Returned when successful",
     *    500="HTTP_INTERNAL_SERVER_ERROR : Return when you have server error"
     *  },
     *  requirements={
     *
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
     * @param Request $request
     * @return \FOS\RestBundle\View\View|\Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function postPostAction(Request $request)
    {
        try {
            $post = new Posts();
            $post->setDate(new \DateTime('NOW'))
                ->setContent($request->get('content', ''))
                ->setTitle($request->get('title', ''))
                ->setStatus($request->get('status', 0))
                ->setCommentStatus($request->get('comment_status', 0))
                ->setDateModified(new \DateTime('NOW'))
                ->setIdUser($this->get('security.token_storage')->getToken()->getUser()->getId())
                ->setIdMenu($request->get('id_menu', 0))
                ->setIdType($request->get('id_type', 0))
                ->setIdCategory($request->get('id_category', 0));

            $entity = $this->getDoctrine()->getManager();
            $entity->persist($post);
            $entity->flush();

            return $this->redirectToRoute('api_get_post',
                array('id' => $post->getId())
            );

        } catch (DBALException $exception) {
            // 500 :: HTTP_INTERNAL_SERVER_ERROR
            return $this->view(null, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Put Posts",
     *  statusCodes={
     *    200="Ok : Returned when successful",
     *    500="HTTP_INTERNAL_SERVER_ERROR : Return when you have server error"
     *  },
     *  requirements={
     *    {
     *      "name"="id",
     *      "dataType"="Integer",
     *      "requirement"="\d+",
     *      "description"="Id Posts"
     *    },
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
     * @param Request $request
     * @param Integer $id
     * @return \FOS\RestBundle\View\View|\Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function putPostAction($id, Request $request)
    {
        try {
            $entity = $this->getDoctrine()
                ->getEntityManager();

            $repository = $entity->getRepository("AAPlatformBundle:Posts");

            $post = $repository->find($id);


            if (!$post) {
                return $this->view(null, Response::HTTP_NO_CONTENT);
            } else {
                $post->setDate($post->getDate())
                    ->setContent($request->get('content', $post->getContent()))
                    ->setTitle($request->get('title', $post->getTitle()))
                    ->setStatus($request->get('status', $post->getStatus()))
                    ->setCommentStatus($request->get('comment_status', $post->getCommentStatus()))
                    ->setDateModified(new \DateTime('NOW'))
                    ->setIdUser($this->get('security.token_storage')->getToken()->getUser()->getId())
                    ->setIdMenu($request->get('id_menu', $post->getIdMenu()))
                    ->setIdType($request->get('id_type', $post->getIdType()))
                    ->setIdCategory($request->get('id_category', $post->getIdCategory()));

                $entity->persist($post);
                $entity->flush();

                return $this->view($post);
            }


        } catch (DBALException $exception) {
            // 500 :: HTTP_INTERNAL_SERVER_ERROR
            return $this->view(null, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

/*
    Exemple Posts :

    Headers:
    ----------------
    Content-Type: application/json; charset=utf-8

    Content:
    ----------------
    {
        "date":"2015-12-16 15:02:08",
        "content":"Welcome to PlatformBundle. This is your first post. Edit or delete it, then start writing!",
        "title":"Hello world!",
        "status":1,
        "comment_status":1,
        "date_modified":"2015-12-16 15:02:09",
        "id_user": null,
        "id_menu": 0,
        "id_type": 0,
        "id_category": 0
    }
*/

