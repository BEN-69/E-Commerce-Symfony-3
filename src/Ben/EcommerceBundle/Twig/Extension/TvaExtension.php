<?php


/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 11/06/17
 * Time: 16:21
 */

namespace Ben\EcommerceBundle\Twig\Extension;

class TvaExtension extends \Twig_Extension
{


    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('tva', array($this, 'tvaFilter')),


        );
    }

    /**
     * @param $prixHT
     * @param $tva
     * @return float
     */
    public function tvaFilter($prixHT,$tva)
    {

       return round($prixHT/$tva,2);
    }

    public function getName()
    {
        return 'tva_extension';
    }



}