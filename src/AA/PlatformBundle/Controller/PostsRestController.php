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
}