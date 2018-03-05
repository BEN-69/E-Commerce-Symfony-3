<?php

namespace Ben\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{

    /**
     * @Route("/pages/{id}", name="page_pages")
     */
    public function pagesAction($id)
    {

        $page=$this->getDoctrine()->getRepository("BenPagesBundle:Pages")->find($id);

        if(!$page) throw $this->createNotFoundException('La page n\'existe pas ');

        return $this->render('BenPagesBundle:Default:pages.html.twig',array('page'=>$page));
    }

    /**
     * @Route("/menu", name="menu_pages")
     */
    public function menuAction()
    {

        $pages=$this->getDoctrine()->getRepository("BenPagesBundle:Pages")->findAll();

        return $this->render('BenPagesBundle:Default:menu.html.twig',array('pages'=>$pages));
    }
}
