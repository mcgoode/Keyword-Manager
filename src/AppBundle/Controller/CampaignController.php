<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Campaign;
use AppBundle\Form\CampaignType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CampaignController extends Controller
{
    /**
     * @Route("campaigns", name="campaign_list")
     */
    public function listAction()
    {
        $campaigns = $this->getDoctrine()->getRepository(Campaign::class)->findAll();

        return $this->render('Campaign/list.html.twig', [
            'campaigns'=>$campaigns
        ]);
    }

    /**
     * @Route("campaign/add", name="campaign_add")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addAction(Request $request)
    {
        // force class to array for getting username. This is only due to not creating a proper user system!
        $userArray = array_values((array)$this->getUser());

        $form = $this->createForm(CampaignType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            /** @var Campaign $product */
            $campaign = $form->getData();

            $campaign->setCreatedBy($userArray[0]);
            $campaign->setCreatedOn( new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($campaign);
            $em->flush();

            return $this->redirectToRoute('campaign_list');
        }

        return $this->render('Campaign/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("campaign/{id}/modify", name="campaign_modify")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Request $request
     * @param Campaign $campaign
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function modifyAction(Request $request, Campaign $campaign)
    {
        $form = $this->createForm(CampaignType::class, $campaign);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('campaign_list');
        }

        return $this->render('Campaign/modify.html.twig', [
            'form' => $form->createView(),
            'campaign'=>$campaign
        ]);
    }

}
