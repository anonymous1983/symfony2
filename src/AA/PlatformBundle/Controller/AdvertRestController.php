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


/*
{
      "id":1,
      "titre":"Mercedes classe c garantie 2017",
      "description":"test test test",
      "url":"a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg",
      "date":"2015-10-14 15:02:08",
      "status":null
}

http://npmasters.com/2012/11/25/Symfony2-Rest-FOSRestBundle.html

http://williamdurand.fr/2012/08/02/rest-apis-with-symfony2-the-right-way/
http://obtao.com/blog/2013/12/creer-une-api-rest-dans-une-application-symfony/

Documentation :
https://github.com/nelmio/NelmioApiDocBundle/blob/master/Resources/doc/the-apidoc-annotation.md
http://swagger.io/

http://afsy.fr/avent/2013/06-best-practices-pour-vos-apis-rest-http-avec-symfony2

https://github.com/marmelab/ng-admin

Symfony HTTP Code :
- http://api.symfony.com/2.7/Symfony/Component/HttpFoundation/Response.html
- https://fr.wikipedia.org/wiki/Liste_des_codes_HTTP

FosRESTBundle view header :
http://symfony.com/doc/current/bundles/FOSRestBundle/2-the-view-layer.html


Authentication  WSSE / Salt :
http://obtao.com/blog/2014/02/configurer-wsse-sur-symfony-avec-le-fosrestbundle/

Authentication  OAuth2 :
https://github.com/FriendsOfSymfony/FOSOAuthServerBundle


FosUserBundle :
http://www.grafikart.fr/tutoriels/symfony/gestion-user-fosuserbundle-383

Bien utiliser les commandes console de Symfony2
http://blog.keiruaprod.fr/2012/03/21/bien-utiliser-les-commandes-console-de-symfony2/


Creat Bundle (Application-specific bundles / Reusable bundles):
http://symfony.com/doc/current/cookbook/bundles/best_practices.html

Nomage Best Practice :
http://www.php-fig.org/psr/psr-4/


http://welcometothebundle.com/speedup-symfony-functional-tests-phpunit/



to creat user
`php app/console fos:user:create admin admin@symfony.com admin`
`php app/console fos:user:active admin`
`php ^pp/console fos:user:promote admin ROLE_ADMIN`

to creat new entity comment
`php app/console doctrine:generate:entity`
`php app/console doctrine:schema:update --force`
`php app/console generate:doctrine:crud AAPlatformBundle:Comment`



*/