<?php

namespace AA\PlatformBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AA\PlatformBundle\Entity\Advert;
use AA\PlatformBundle\Form\AdvertType;

// use Symfony\component\HttpFoundation\JsonResponse;


class AdvertRestController extends Controller
{
    public function getAdvertsAction()
    {
       $adverts = $this->getDoctrine()
            ->getRepository("AAPlatformBundle:Advert")
            ->findAll();

        return $adverts;
    }

    public function getAdvertAction($id)
    {
       $advert = $this->getDoctrine()
            ->getRepository("AAPlatformBundle:Advert")
            ->find($id);

        return $advert;
    }

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
*/