<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function dashboardAction()
    {
        // replace this example code with whatever you need
        return $this->render('Dashboard/index.html.twig');
    }
}
