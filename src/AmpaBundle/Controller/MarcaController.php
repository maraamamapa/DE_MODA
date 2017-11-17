<?php

namespace AmpaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AmpaBundle\Form\marcaType;
use AmpaBundle\Entity\marca;
use AmpaBundle\Entity\Ropa;
use Symfony\Component\HttpFoundation\Request;

class MarcaController extends Controller
{

    /*Muestro toda la tabla ropa*/
    public function mostrarMarcaAction()
    {
        $repository = $this->getDoctrine()->getRepository('AmpaBundle:marca');
        // find *all* ropa
        $marca = $repository->findAll();
        return $this->render('AmpaBundle:Carpeta_marca:marcas.html.twig',array('tablaMarca' => $marca ));
    }

    public function insertarMarcaAction(Request $request)
    {

        $marca = new marca();
        $form= $this->createForm(marcaType::class,$marca);/*Aquí le añadimos la variable del objeto*/
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $marca = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $DB = $this->getDoctrine()->getManager();
             $DB->persist($marca);
             $DB->flush();

              return $this->redirectToRoute('ampa_mostrarMarca');
            }
        return $this->render('AmpaBundle:Carpeta_marca:insertarMarca.html.twig',array('form' =>$form->createView() ));
    }

    public function actualizarMarcaAction(Request $request,$id)
    {
      $marca = $this->getDoctrine()->getRepository('AmpaBundle:marca')->find($id);

        if(!$marca){return $this->redirectToRoute('ampa_ropa');}
        $form = $this->createForm(\AmpaBundle\Form\marcaType::class, $marca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $DB = $this->getDoctrine()->getManager();
            $DB->persist($marca);
            $DB->flush();
            return $this->redirectToRoute('ampa_actualizarMarca', ["id" => $id]);
        }
        return $this->render("AmpaBundle:Carpeta_marca:modificaMarca.html.twig", array('form'=>$form->createView() ));
    }


    public function deleteMarcaAction($id)
    {
      $DB = $this->getDoctrine()->getManager();
            $eliminar = $DB->getRepository('AmpaBundle:marca')->find($id);

            if (!$eliminar) {
                throw $this->createNotFoundException(
                    'No se ha encontrado el id: '.$id
                );
            }

            $DB->remove($eliminar);
            $DB->flush();

        return $this->render("AmpaBundle:Carpeta_marca:eliminarMarca.html.twig", array('TablaMarca'=>$eliminar));
    }

}
