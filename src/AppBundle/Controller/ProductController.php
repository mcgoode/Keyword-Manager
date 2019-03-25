<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
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
        return $this->render('Product/list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("products/add", name="product_add")
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
            //$form->getData() holds the submitted values
            // but, the original `$client` variable has also been updated


            /** @var Product $product */
            $product = $form->getData();

            $product->setCreatedBy($userArray[0]);
            $product->setCreatedOn( new \DateTime('now'));

            dump($product);

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
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

}
