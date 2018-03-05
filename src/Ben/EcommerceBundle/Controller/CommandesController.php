<?php

namespace Ben\EcommerceBundle\Controller;


use Ben\EcommerceBundle\Entity\Commandes;
use Ben\EcommerceBundle\Entity\Produits;
use Ben\EcommerceBundle\Entity\UtilisateursAdresses;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class CommandesController extends Controller
{
    /**
     * @return array
     */
    public function facture()
    {
        $em = $this->getDoctrine()->getManager();
       // $generator = $this->container->get('security.secure_random');
        $generator = random_bytes(20);
        //$session = $this->getRequest()->getSession();
        $session = $this->get('request_stack')->getCurrentRequest()->getSession();
        $adress = $session->get('adress');
        $panier = $session->get('panier');
        $commande = array();
        $totalHT = 0;
        $totalTVA = 0;


        $facturation = $em->getRepository('BenEcommerceBundle:UtilisateursAdresses')->find($adress['facturation']);
        $livraison = $em->getRepository('BenEcommerceBundle:UtilisateursAdresses')->find($adress['livraison']);
        $produits = $em->getRepository('BenEcommerceBundle:Produits')->findArray(array_keys($session->get('panier')));

        foreach($produits as $produit)
        {
            $prixHT = ($produit->getPrix() * $panier[$produit->getId()]);
            $prixTTC = ($produit->getPrix() * $panier[$produit->getId()] / $produit->getTva()->getMultiplicate());
            $totalHT += $prixHT;


            if (!isset($commande['tva']['%'.$produit->getTva()->getValeur()]))
                $commande['tva']['%'.$produit->getTva()->getValeur()] = round($prixTTC - $prixHT,2);
            else
                $commande['tva']['%'.$produit->getTva()->getValeur()] += round($prixTTC - $prixHT,2);


            $totalTVA += round($prixTTC - $prixHT,2);
            $commande['produit'][$produit->getId()] = array('reference' => $produit->getNom(),
                                                            'quantite' => $panier[$produit->getId()],
                                                            'prixHT' => round($produit->getPrix(),2),
                                                            'prixTTC' => round($produit->getPrix() / $produit->getTva()->getMultiplicate(),2));
        }

        $commande['livraison'] = array('prenom' => $livraison->getPrenom(),
                                        'nom' => $livraison->getNom(),
                                        'telephone' => $livraison->getTelephone(),
                                        'adresse' => $livraison->getAdresse(),
                                        'cp' => $livraison->getCp(),
                                        'ville' => $livraison->getVille(),
                                        'pays' => $livraison->getPays(),
                                        'complement' => $livraison->getComplement());
        $commande['facturation'] = array('prenom' => $facturation->getPrenom(),
                                        'nom' => $facturation->getNom(),
                                        'telephone' => $facturation->getTelephone(),
                                        'adresse' => $facturation->getAdresse(),
                                        'cp' => $facturation->getCp(),
                                        'ville' => $facturation->getVille(),
                                        'pays' => $facturation->getPays(),
                                        'complement' => $facturation->getComplement());
        $commande['prixHT'] = round($totalHT,2);
        $commande['prixTTC'] = round($totalHT + $totalTVA,2);
        $commande['token'] = bin2hex($generator);
        return $commande;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function prepareCommandeAction(Request $request)
    {

        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();

        if (!$session->has('commande'))
        {
            $commande = new Commandes();
        } else {
            $commande = $em->getRepository('BenEcommerceBundle:Commandes')->find($session->get('commande'));
        }


        $commande->setDate(new \DateTime());
        $commande->setUtilisateur($this->container->get('security.token_storage')->getToken()->getUser());
        $commande->setValider(0);
        $commande->setReference(0);
        $commande->setCommande($this->facture());


        if (!$session->has('commande'))
        {
            $em->persist($commande);
            $session->set('commande',$commande);
        }
        $em->flush();
        return new Response($commande->getId());
    }



    /*
    *   Cette methode remplace l'API banque
    */
    /**
     * @Route("/api/banque/{id}", name="page_validationCommande")
     */
    public function validationCommandeAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('BenEcommerceBundle:Commandes')->find($id);
        if (!$commande || $commande->getValider() == 1)
        {
            throw $this->createNotFoundException('La commande n\'existe pas !');
        }
        $commande->setValider(1);
       // $commande->setReference(1); //Service a faire
        $commande->setReference($this->container->get('setNewReference')->reference()); //Service a faire
        $em->flush();

        $session = $request->getSession();

        $session->remove('adress');
        $session->remove('panier');
        $session->remove('commande');

        // ici le mail de validation
        $message = \Swift_Message::newInstance()
            ->setSubject('Validation de votre commande')
            ->setFrom(array('r.benaata@gmail.com' => "Fruits & Légumes"))
            ->setTo($commande->getUtilisateur()->getEmailCanonical())
            ->setCharset('utf-8')
            ->setContentType('text/html')
            ->setBody($this->renderView('@BenEcommerce/SwiftLayout/validationCommande.html.twig',array('utilisateur' => $commande->getUtilisateur())));
        $this->get('mailer')->send($message);

        $this->get('session')->getFlashBag()->add('success','Votre commande est validée avec succès');

        return $this->redirectToRoute('page_factures');
    }



}
