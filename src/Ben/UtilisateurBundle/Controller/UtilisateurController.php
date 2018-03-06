<?php

namespace Ben\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UtilisateurController extends Controller
{


    /**
     * @Route("/villes/{cp}", name="page_villes" , options={"expose"= true} )
     * @param Request $request
     * @param $cp
     * @return JsonResponse
     */
    public function villesAction(Request $request,$cp)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $villeCodePostal = $em->getRepository('BenUtilisateurBundle:Villes')->findOneBy(array('villeCodePostal' => $cp));

            if ($villeCodePostal) {
                $ville = $villeCodePostal->getVilleNom();
            } else {
                $ville = null;
            }
            $response = new JsonResponse();
            return $response->setData(array('ville' => $ville));
        } else {
            throw new Exception('Erreur');
        }
            /*

                if ($request->isXmlHttpRequest()) {
                    $em = $this->getDoctrine()->getManager();
                    $villeCodePostal = $em->getRepository('BenUtilisateurBundle:Villes')->findBy(array('villeCodePostal' => $cp));
                    if ($villeCodePostal) {
                        $villes = array();
                        foreach($villeCodePostal as $ville) {
                            $villes[] = $ville->getVilleNom();
                        }
                    } else {
                        $ville = null;
                    }
                    $response = new JsonResponse();
                    return $response->setData(array('ville' => $villes));
                } else {
                    throw new Exception('Erreur');
                }
             }*/
    }


    /**
     * @Route("/factures", name="page_factures")
     */

    public function facturesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $factures = $em->getRepository('BenEcommerceBundle:Commandes')->byFacture($this->getUser());


        return $this->render('BenUtilisateurBundle:Factures:factures.html.twig', array('factures' => $factures));
    }


    /**
     * @Route("/factures/PDF/{id}", name="page_facturePDF")
     */
    public function facturePDFAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('BenEcommerceBundle:Commandes')->findOneBy(array('utilisateur' => $this->getUser(),
            'valider' => 1,
            'id' => $id));
        if (!$facture)
        {
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue lors du géneration PDF');
            return $this->redirect($this->generateUrl('page_factures'));
        }
       // $this->container->get('setNewFacture')->facture($facture);
        $response= $this->container->get('setNewFacture')->facture($facture);

        return new Response($response->Output('facture .pdf'), 200, array('Content-Type' => 'application/pdf'));

    }
}
