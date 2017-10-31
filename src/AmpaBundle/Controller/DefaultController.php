<?php

namespace AmpaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AmpaBundle:Default:index.html.twig');
    }
    public function ropaAction()
    {
        return $this->render('AmpaBundle:Default:ropa.html.twig');
    }
    public function complementosAction()
    {
        return $this->render('AmpaBundle:Default:complementos.html.twig');
    }
  
}
