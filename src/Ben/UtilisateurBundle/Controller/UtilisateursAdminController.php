<?php

namespace Ben\UtilisateurBundle\Controller;

use Ben\UtilisateurBundle\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Utilisateur controller.
 *
 * @Route("admin/utilisateurs")
 */
class UtilisateursAdminController extends Controller
{
    /**
     * Lists all utilisateur entities.
     *
     * @Route("/", name="admin_utilisateurs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $utilisateurs = $em->getRepository('BenUtilisateurBundle:Utilisateur')->findAll();

        return $this->render('BenUtilisateurBundle:Admin:utilisateursAdmin/index.html.twig', array(
            'utilisateurs' => $utilisateurs,
        ));
    }

    /**
     * Finds and displays a utilisateur entity.
     *
     *
     * @Route("/{id}/adresses", name="admin_utilisateurs_adresses_show")
     * @Route("/{id}/factures", name="admin_utilisateurs_factures_show")
     * @Method("GET")
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository('BenUtilisateurBundle:Utilisateur')->find($id);
        $route = $request->get('_route');
        if ($route == 'admin_utilisateurs_adresses_show')
        {
            return $this->render('BenUtilisateurBundle:Admin:utilisateursAdmin/adresses.html.twig', array('utilisateur' => $utilisateur));

        } elseif ($route == 'admin_utilisateurs_factures_show'){

            return $this->render('BenUtilisateurBundle:Admin:utilisateursAdmin/factures.html.twig', array('utilisateur' => $utilisateur));
        } else {

            throw $this->createNotFoundException('La vue n\'existe pas !');
        }
    }
}
