<?php

namespace AccountsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AccountsBundle:Default:index.html.twig', array('name' => $name));
    }
}
