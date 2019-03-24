<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
     * @Route("product/add")
     */
    public function addAction()
    {
        return $this->render('Product/add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("product/modify")
     */
    public function modifyAction()
    {
        return $this->render('Product/modify.html.twig', array(
            // ...
        ));
    }

}
