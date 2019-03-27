<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Client;
use AppBundle\Form\ClientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends Controller
{
    /**
     * @Route("/clients", name="client_list")
     */
    public function listAction()
    {
        // can easily paginate this list to handle LARGE amounts of data
        $activeClients = $this->getDoctrine()->getRepository(Client::class)->findAll();

        return $this->render('Client/list.html.twig',[
            'clients'=>$activeClients
        ]);
    }

    /**
     * @Route("/clients/add", name="client_add")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function addAction(Request $request)
    {
        $client = new Client();

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
             //$form->getData() holds the submitted values
            // but, the original `$client` variable has also been updated
            $userArray = array_values((array)$this->getUser());

            /** @var Client $client */
            $client = $form->getData();
            $client->setCreatedOn( new \DateTime('now'))
                ->setCreatedBy($userArray[0]);
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $em = $this->getDoctrine()->getManager();
             $em->persist($client);
             $em->flush();

            return $this->redirectToRoute('client_list');
        }

        return $this->render('Client/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     *
     * @Route("/clients/{id}/modify", name="client_modify")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Client $client
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function modifyAction(Client $client, Request $request)
    {

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush(); // update

            return $this->redirectToRoute('client_list');
        }

        return $this->render('Client/modify.html.twig', [
            'form' => $form->createView(),
            'client' => $client
        ]);
    }

    /**
     * @Route("clients/{id}/remove", name="client_remove")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Client $client
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function removeAction(Client $client)
    {
        $userArray = array_values((array)$this->getUser());
        $client->setRemovedBy($userArray[0])->setRemovedOn( new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->redirectToRoute('client_list');
    }

    /**
     * @Route("clients/{id}/restore", name="client_restore")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Client $client
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function restoreAction(Client $client)
    {
        $client->setRemovedBy(null)->setRemovedOn( null);

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->redirectToRoute('client_list');
    }

}
