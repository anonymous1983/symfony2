<?php

namespace AA\PlatformBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use AA\PlatformBundle\Entity\Advert;
use AA\PlatformBundle\Form\AdvertType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

// use Symfony\component\HttpFoundation\JsonResponse;


class AdvertRestController extends Controller
{

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get All Adverts",
     *  statusCodes={
     *    200="Ok : Returned when successful",
     *    204="No Content : Returned when successful but no data"
     *  },
     *  tags={
     *    "stable" = "#5e8014"
     *  }
     * )
     */
    public function getAdvertsAction()
    {
       $adverts = $this->getDoctrine()
            ->getRepository("AAPlatformBundle:Advert")
            ->findBy(array(), array(), 2, 5);

        return $adverts;
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Get Advert by id",
     *  statusCodes={
     *    200="Ok : Request succeeded. Response included",
     *    204="No Content : Request succeeded, but no response body"
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
        if(is_numeric($id)){
            $advert = $this->getDoctrine()
                ->getRepository("AAPlatformBundle:Advert")
                ->find($id);
            if (!$advert) {
                throw new HttpException(204, "No Advert found for id ".$id);
            }

            return $advert;            
        }else{
            throw new HttpException(400, "The id must be integer") ;
            return "";
        }
       
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Add new advert",
     *  statusCodes={
     *    200="Ok : Returned when successful",
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
*/