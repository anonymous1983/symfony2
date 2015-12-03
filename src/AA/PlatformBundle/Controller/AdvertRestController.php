<?php

namespace AA\PlatformBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AA\PlatformBundle\Entity\Advert;

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
}