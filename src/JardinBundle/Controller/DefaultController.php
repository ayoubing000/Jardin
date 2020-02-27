<?php

namespace JardinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JardinBundle:dashboard:base_user.html.twig');
    }

    public function CalendarAction()
    {
        // replace this example code with whatever you need
        return $this->render('JardinBundle:Calandar:calandar.html.twig');
    }
}
