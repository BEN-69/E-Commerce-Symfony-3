<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 21/02/2018
 * Time: 09:06
 */

namespace Ben\EcommerceBundle\Services;

use Symfony\Component\Security\Core\Security;


class GetReference
{
    public function __construct($securityContext, $entityManager)
    {
        $this->securityContext = $securityContext;
        $this->em = $entityManager;
    }
    public function reference()
    {
        $reference = $this->em->getRepository('BenEcommerceBundle:Commandes')->findOneBy(array('valider' => 1), array('id' => 'DESC'),1,1);
        if (!$reference)
        {
            return 1;
        } else {
            return $reference->getReference() +1;
        }
    }
}