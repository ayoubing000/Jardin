<?php


namespace JardinBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends  Controller
{
    public function userHomeAction(){
        $username=(string) $this->getUser();
        return $this->render('JardinBundle:dashboard:index.html.twig',array('username'=> $username));
    }
}