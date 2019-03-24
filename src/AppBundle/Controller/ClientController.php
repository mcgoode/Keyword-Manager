<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends Controller
{
    /**
     * @Route("/clients", name="client_list")
     */
    public function listAction()
    {
        return $this->render('Client/list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/client/add")
     */
    public function addAction()
    {
        return $this->render('Client/add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/client/modify")
     */
    public function modifyAction()
    {
        return $this->render('Client/modify.html.twig', array(
            // ...
        ));
    }

}
