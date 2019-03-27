<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Campaign;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class ReportController extends Controller
{

    /**
     * @Route("reports/list", name="report_list")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function reportListAction()
    {
        return $this->render('Report/list.html.twig');

    }

    /**
     * @Route("reports/active-ended-campaigns",name="report_active_ended")
     */
    public function showActiveButEndedCampaignsAction()
    {
        $campaings = $this->getDoctrine()->getRepository(Campaign::class)->findByActiveAndPastEndDate();

        return $this->render('Report/activeEndedCampaigns.html.twig', [
            'campaings'=>$campaings
        ]);
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
