<?php

namespace AmpaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AmpaBundle\Form\RopaType;
use AmpaBundle\Entity\marca;
use AmpaBundle\Entity\Ropa;
use Symfony\Component\HttpFoundation\Request;

class RopaController extends Controller
{

    /*Muestro toda la tabla ropa*/
    public function ropaAction()
    {
        $repository = $this->getDoctrine()->getRepository('AmpaBundle:Ropa');
        // find *all* ropa
        $ropa = $repository->findAll();
        return $this->render('AmpaBundle:Carpeta_ropa:ropa.html.twig',array('tablaRopa' => $ropa ));
    }
    //prueba ej1
    // muestra por talla de ropa
    public function muestraNombreAction($talla)
    {

        $repository = $this->getDoctrine()->getRepository('AmpaBundle:Ropa');

        // find *all* alumnos
        $name = $repository->findByTalla($talla);

        return $this->render('AmpaBundle:Carpeta_ropa:muestraNombre.html.twig',array('tablaNombre' => $name ));
    }
    //prueba ej2
    //busca por id
    public function muestrameAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AmpaBundle:Ropa');
        $muestrame = $repository->find($id);

        return $this->render('AmpaBundle:Carpeta_ropa:muestraNombreC.html.twig',array('tablaMuestra' => $muestrame ));
    }





    public function insertarAction(Request $request)
    {

        $ropa = new Ropa();
        $form= $this->createForm(RopaType::class,$ropa);/*Aquí le añadimos la variable del objeto*/
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $ropa = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $DB = $this->getDoctrine()->getManager();
             $DB->persist($ropa);
             $DB->flush();

              return $this->redirectToRoute('ampa_ropa');
            }
        return $this->render('AmpaBundle:Carpeta_ropa:insertarRopa.html.twig',array('form' =>$form->createView() ));
    }

    public function actualizarAction(Request $request,$id)
    {
      $ropa = $this->getDoctrine()->getRepository('AmpaBundle:Ropa')->find($id);

        if(!$ropa){return $this->redirectToRoute('ampa_ropa');}
        $form = $this->createForm(\AmpaBundle\Form\RopaType::class, $ropa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $DB = $this->getDoctrine()->getManager();
            $DB->persist($ropa);
            $DB->flush();
            return $this->redirectToRoute('ampa_actualizarRopa', ["id" => $id]);
        }
        return $this->render("AmpaBundle:Carpeta_ropa:modificaRopa.html.twig", array('form'=>$form->createView() ));
    }
    public function deleteAction($id)
    {
      $DB = $this->getDoctrine()->getManager();
            $eliminar = $DB->getRepository('AmpaBundle:Ropa')->find($id);

            if (!$eliminar) {
                throw $this->createNotFoundException(
                    'No se ha encontrado el id: '.$id
                );
            }

            $DB->remove($eliminar);
            $DB->flush();

        return $this->render("AmpaBundle:Carpeta_ropa:eliminarRopa.html.twig", array('TablaRopa'=>$eliminar));
    }

}
