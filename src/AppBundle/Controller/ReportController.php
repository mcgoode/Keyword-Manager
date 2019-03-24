<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class ReportController extends Controller
{
    /**
     * @Route("report/client/{id}/finished-campaigns")
     */
    public function getFinishedCampaignsForClientAction($id)
    {
        return $this->render('Report/get_finished_campaigns_for_client.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("report/active-campaigns")
     */
    public function getAllActiveCampaignsAction()
    {
        return $this->render('Report/get_all_active_campaigns.html.twig', array(
            // ...
        ));
    }

}
