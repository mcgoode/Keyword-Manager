<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ServiceProviderController extends Controller
{
    /**
     * @Route("service-providers", name="serviceProvider_list")
     *
     */
    public function listAction()
    {
        return $this->render('ServiceProvider/list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("service-provider/add")
     */
    public function addAction()
    {
        return $this->render('ServiceProvider/add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("service-provider/modify")
     */
    public function modifyAction()
    {
        return $this->render('ServiceProvider/modify.html.twig', array(
            // ...
        ));
    }

}
