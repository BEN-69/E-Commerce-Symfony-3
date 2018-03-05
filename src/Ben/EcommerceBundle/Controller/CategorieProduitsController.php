<?php

namespace Ben\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class CategorieProduitsController extends Controller
{

    /**
     * @Route("/categorieproduits/{id}", name="page_produitsParCategorie")
     */
    public function categorieproduitsAction($id)
    {

        $session= new Session();
        $produits=$this->getDoctrine()->getRepository('BenEcommerceBundle:Produits')->produitsByCategorie($id) ;
        $titre='r';
      // $produits=$this->getDoctrine()->getRepository('BenEcommerceBundle:Produits')->findBy(array('categorie' => $id));

        if(!$produits) throw $this->createNotFoundException('La page n\'existe pas ');
        if ($session->has('panier')) {

            $panier = $session->get('panier');
        }else{

            $panier=false;
        }

        //  return new Response(var_dump($produits));
       return $this->render('@BenEcommerce/Produits/categorieproduits.html.twig',array('produits'=> $produits,'panier'=>$panier,'t'=>$titre));
    }

}
