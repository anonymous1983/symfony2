<?php

namespace AccountsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AA\PlatformBundle\Entity\Advert;

class LoginController extends Controller
{
    public function indexAction()
    {
        return $this->render('AccountsBundle:Login:index.html.twig');
    }
}