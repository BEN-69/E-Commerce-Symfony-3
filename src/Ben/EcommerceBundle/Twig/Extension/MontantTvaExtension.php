<?php


/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 11/06/17
 * Time: 16:21
 */

namespace Ben\EcommerceBundle\Twig\Extension;

class MontantTvaExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('montantTva', array($this,'montantTvaFilter')));
    }

    function montantTvaFilter($prixHT,$tva)
    {
        return round((($prixHT / $tva) - $prixHT),2);
    }

    public function getName()
    {
        return 'montant_tva_extension';
    }
}