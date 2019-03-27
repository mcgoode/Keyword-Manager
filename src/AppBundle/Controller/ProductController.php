<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("products" , name="product_list")
     */
    public function listAction()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('Product/list.html.twig',[
            'products'=>$products
        ]);
    }

    /**
     * @Route("products/add", name="product_add")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function addAction(Request $request)
    {

        // force class to array for getting username. This is only due to not creating a proper user system!
        $userArray = array_values((array)$this->getUser());

        $form = $this->createForm(ProductType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            /** @var Product $product */
            $product = $form->getData();

            $product->setCreatedBy($userArray[0]);
            $product->setCreatedOn( new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_list');
        }

        return $this->render('Product/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("products/{id}/modify", name="product_modify")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Product $product
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function modifyAction(Product $product, Request $request)
    {

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('product_list');
        }

        return $this->render('Product/modify.html.twig', [
            'form' => $form->createView(),
            'product'=>$product
        ]);
    }

    /**
     * @Route("products/{id}/remove", name="product_remove")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function removeAction(Product $product)
    {
        $userArray = array_values((array)$this->getUser());
        $product->setRemovedBy($userArray[0])->setRemovedOn( new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->redirectToRoute('product_list');
    }

    /**
     * @Route("product/{id}/restore", name="product_restore")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function restoreAction(Product $product)
    {
        $product->setRemovedBy(null)->setRemovedOn( null);

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->redirectToRoute('client_list');
    }

}
