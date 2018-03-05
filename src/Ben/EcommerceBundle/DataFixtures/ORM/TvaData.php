<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 24/05/17
 * Time: 09:41
 */

namespace Ben\EcommerceBundle\DataFixtures\ORM;


use Ben\EcommerceBundle\Entity\Tva;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class TvaData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $tva1 = new Tva();
        $tva1->setMultiplicate('0.98');
        $tva1->setNom('TVA 20%');
        $tva1->setValeur('20');
        $manager->persist($tva1);

        $tva2 = new Tva();
        $tva2->setMultiplicate('0.83');
        $tva2->setNom('TVA 10%');
        $tva2->setValeur('10');
        $manager->persist($tva2);





        $manager->flush();
        /*

        $this->addReference('tva1', $tva1);
        $this->addReference('tva2', $tva2);*/

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
        return 1;
    }
}