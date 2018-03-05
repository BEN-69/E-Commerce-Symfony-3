<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 21/02/2018
 * Time: 09:06
 */

namespace Ben\EcommerceBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Security;


class GetFacture extends Controller
{
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function facture($facture)
    {
        $html = $this->renderView('BenUtilisateurBundle:Factures:facturePDF.html.twig', array('facture'=>$facture));
        $html2pdf = $this->get('html2pdf_factory')->create();
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);

        return $html2pdf;
      //  return new Response($html2pdf->Output('facture .pdf'), 200, array('Content-Type' => 'application/pdf'));

    }
}