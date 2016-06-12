<?php

namespace Km\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KmTestBundle:Default:index.html.twig');
    }
}
