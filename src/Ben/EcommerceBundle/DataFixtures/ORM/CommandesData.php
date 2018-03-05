<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 24/05/17
 * Time: 09:41
 */

namespace Ben\EcommerceBundle\DataFixtures\ORM;


use Ben\EcommerceBundle\Entity\Commandes;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class CommandesData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /*
         *
         $commandes1 = new Commandes();
        $commandes1->setUtilisateur($this->getReference('utilisateur1'));
        $commandes1->setDate(new \DateTime());
        $commandes1->setProduits(array('0' => array('7' => '2'),
                                       '1' => array('8' => '1')
                                        )
                                );
        $commandes1->setReference('1');
        $commandes1->setValider('1');
        $manager->persist($commandes1);



        $commandes2 = new Commandes();
        $commandes2->setUtilisateur($this->getReference('utilisateur2'));
        $commandes2->setDate(new \DateTime());
        $commandes2->setProduits(array('0' => array('7' => '3'),
                '1' => array('8' => '5')
            )
        );
        $commandes2->setReference('2');
        $commandes2->setValider('1');
        $manager->persist($commandes2);


        $manager->flush();
        */

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
}