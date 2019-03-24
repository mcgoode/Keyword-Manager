<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class CampaignController extends Controller
{
    /**
     * @Route("campaigns", name="campaign_list")
     */
    public function listAction()
    {
        return $this->render('Campaign/list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("campaign/add")
     */
    public function addAction()
    {
        return $this->render('Campaign/add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("campaign/modify")
     */
    public function modifyAction()
    {
        return $this->render('Campaign/modify.html.twig', array(
            // ...
        ));
    }

}
