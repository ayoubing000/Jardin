<?php


namespace JardinBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends  Controller
{
    public function userHomeAction(){
        $username=(string) $this->getUser();
        return $this->render('JardinBundle:dashboard:base_user.html.twig',array('username'=> $username));
    }
    public function adminHomeAction(){
        $username=(string) $this->getUser();
        return $this->render('::base_admin.html.twig',array('username'=> $username));
    }
}