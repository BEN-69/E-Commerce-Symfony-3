<?php

namespace Ben\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{



    /**
     * @Route("/categories", name="menu_categories")
     */
    public function menuAction()
    {
        $categories=$this->getDoctrine()->getRepository('BenEcommerceBundle:Categories')->findAll();

       // if(!$categories) throw $this->createNotFoundException('La page n\'existe pas ');

        return $this->render('@BenEcommerce/Categories/menu.html.twig',array('categories'=>$categories));
    }


}
