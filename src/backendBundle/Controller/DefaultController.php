<?php

namespace backendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use backendBundle\Services\Helpers;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('backendBundle:Default:index.html.twig');
    }

    public function jsonAction() {
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();
        $Equiposlista = $em->getRepository('backendBundle:User')->findAll();

        $datos = array();
        foreach ($Equiposlista as $key => $entity) {
            foreach ($entity as $k => $ent){
                $datos[$key] = $ent[$key][$k];
                
            }   
        }
        echo $datos[$key];
        die();
        $valores = array();
        foreach ($userList as $key => $entity) {
            $valores[$key] = $entity->getValor();
        }


        $data = array(
            'status' => 'success',
            'code' => 200,
            'msg' => 'Jaló',
            'nom' => $datos,
            'val' =>$valores
        );
        // $helpers->json($data);

        return $helpers->json($data);
    }

}
