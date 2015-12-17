<?php

namespace AA\PlatformBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AA\PlatformBundle\Entity\Advert;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\FOSRestController;

class AdvertRestController extends FOSRestController
{

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get All Adverts",
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
    public function getAdvertsAction(Request $request)
    {
        // Set limit | default = 5
        $limit = $request->get('limit') ? $request->get('limit') : 5;
        // Set offset | default = 0
        $offset = $request->get('offset') ? $request->get('offset') : 0;

        $adverts = $this->getDoctrine()
            ->getRepository("AAPlatformBundle:Advert")
            ->findBy(
                    array(), 
                    array(), 
                    $limit, 
                    $offset
                );
        // 206 :: HTTP_PARTIAL_CONTENT
        if (0 < count($adverts) && count($adverts) < $limit) {
            return  $this->view($adverts, Response::HTTP_PARTIAL_CONTENT);
        }
        // 204 :: HTTP_NO_CONTENT
        if (!$adverts) {
            return  $this->view($adverts, Response::HTTP_NO_CONTENT);
        }
        // 202 :: HTTP_OK
        return  $this->view($adverts, Response::HTTP_OK);
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get Advert by id",
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
    public function getAdvertAction($id)
    {
        if (is_numeric($id)) {
            $advert = $this->getDoctrine()
                ->getRepository("AAPlatformBundle:Advert")
                ->find($id);
            if (!$advert) {
                // 204 :: HTTP_NO_CONTENT
                return  $this->view(null, Response::HTTP_NO_CONTENT);
            }

            // 202 :: HTTP_OK
            return  $this->view($advert, Response::HTTP_OK);
        } else {

            // 400 :: HTTP_BAD_REQUEST
            return  $this->view(null, Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Add new advert",
     *  statusCodes={
     *    200="Ok : Returned when successful"
     *  },
     *  requirements={
     *    {
     *      "name"="request",
     *      "dataType"="Json",
     *      "requirement"="\d+",
     *      "description"="Advert Object"
     *    }
     *  },
     *  tags={
     *    "stable" = "#5e8014"
     *  }
     * )
     */

    public function postAdvertAction(Request $request)
    {

        $entity = $this->getDoctrine()->getManager();

        $advert = new Advert();
        $advert->setTitre($request->get('titre'))
            ->setDescription($request->get('description'))
            ->setUrl($request->get('url'))
            ->setDate(new \DateTime($request->get('date')));

        $entity->persist($advert);
        $entity->flush();

        return $this->redirectToRoute('api_get_advert',
            array('id' => $advert->getId())
        );
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get comments for Advert",
     *  statusCodes={
     *    200="HTTP_OK : Returned when successful",
     *    204="HTTP_NO_CONTENT : Returned when successful but no data",
     *    206="HTTP_PARTIAL_CONTENT : Return when successful but it's the last recordings",
     *    400="HTTP_BAD_REQUEST : Problem with your input"
     *  },
     *  requirements={
     *    {
     *      "name"="id",
     *      "dataType"="Integer",
     *      "requirement"="\d+",
     *      "description"="Id of advert"
     *    }
     *  },
     *  tags={
     *    "Entity" = "[Advert, Comments]",
     *    "Alpha" = "#ff0000"
     *  }
     * )
     */
    public function getCommentsAdvertAction(Request $request, $id)
    {

        // Set limit | default = 5
        $limit = $request->get('limit') ? $request->get('limit') : 5;
        // Set offset | default = 0
        $offset = $request->get('offset') ? $request->get('offset') : 0;

        if (is_numeric($id)) {

            $comments = $this->getDoctrine()
                ->getRepository("AAPlatformBundle:Comment")
                ->findBy(
                        array('idRelation' => $id), 
                        array(), 
                        $limit, 
                        $offset
                    );
            // 206 :: HTTP_PARTIAL_CONTENT
            if (0 < count($comments) && count($comments) < $limit) {
                return  $this->view($comments, Response::HTTP_PARTIAL_CONTENT);
            }
            // 204 :: HTTP_NO_CONTENT
            if (!$comments) {
                return  $this->view($comments, Response::HTTP_NO_CONTENT);
            }
            // 200 :: HTTP_OK
            return  $this->view($comments, Response::HTTP_OK);

        } else {
            // 400 :: HTTP_BAD_REQUEST
            return  $this->view(null, Response::HTTP_BAD_REQUEST);
        }

    }

}

