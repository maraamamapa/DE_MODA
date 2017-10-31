<?php

namespace AmpaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RopaController extends Controller
{

    public function ropaAction()
    {
        $repository = $this->getDoctrine()->getRepository('AmpaBundle:Ropa');
        // find *all* ropa
        $ropa = $repository->findAll();
        return $this->render('AmpaBundle:Carpeta_ropa:ropa.html.twig',array('tablaRopa' => $ropa ));
    }


}
