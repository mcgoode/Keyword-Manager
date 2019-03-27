<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ServiceProvider;
use AppBundle\Form\ServiceProviderType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ServiceProviderController extends Controller
{
    /**
     * @Route("service-providers", name="serviceProvider_list")
     *
     */
    public function listAction()
    {
        $serviceProviders = $this->getDoctrine()->getRepository(ServiceProvider::class)->findAll();

        return $this->render('ServiceProvider/list.html.twig', [
            'serviceProviders'=>$serviceProviders
        ]);
    }

    /**
     * @Route("service-providers/add", name="serviceProvider_add")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function addAction(Request $request)
    {
        // force class to array for getting username. This is only due to not creating a proper user system!
        $userArray = array_values((array)$this->getUser());

        $form = $this->createForm(ServiceProviderType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            /** @var ServiceProvider $provider */
            $provider = $form->getData();

            $provider->setCreatedBy($userArray[0]);
            $provider->setCreatedOn( new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($provider);
            $em->flush();

            return $this->redirectToRoute('serviceProvider_list');
        }

        return $this->render('ServiceProvider/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("service-providers/{id}/modify", name="serviceProvider_modify")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Request $request
     * @param ServiceProvider $serviceProvider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function modifyAction(ServiceProvider $serviceProvider, Request $request)
    {
        $form = $this->createForm(ServiceProviderType::class, $serviceProvider);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('serviceProvider_list');
        }

        return $this->render('ServiceProvider/modify.html.twig', [
            'form' => $form->createView(),
            'provider'=>$serviceProvider
        ]);
    }

    /**
     * @Route("service-providers/{id}/remove", name="serviceProvider_remove")
     * @Security("has_role('ROLE_ADMIN')")
     * @param ServiceProvider $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function removeAction(ServiceProvider $provider)
    {
        $userArray = array_values((array)$this->getUser());
        $provider->setRemovedBy($userArray[0])->setRemovedOn( new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->redirectToRoute('serviceProvider_list');
    }

    /**
     * @Route("service-providers/{id}/restore", name="serviceProvider_restore")
     * @Security("has_role('ROLE_ADMIN')")
     * @param ServiceProvider $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function restoreAction(ServiceProvider $provider)
    {
        $provider->setRemovedBy(null)->setRemovedOn( null);

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->redirectToRoute('client_list');
    }

}
