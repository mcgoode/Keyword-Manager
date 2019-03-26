<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Campaign;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function dashboardAction()
    {
        $activeCampaigns = $this->getDoctrine()->getRepository(Campaign::class)->findBy(['active'=>true]);

        // replace this example code with whatever you need
        return $this->render('Dashboard/index.html.twig',[
            'activeCampaigns'=>$activeCampaigns
        ]);
    }
}
