<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 24/05/17
 * Time: 09:41
 */

namespace Ben\UtilisateurBundle\DataFixtures\ORM;


use Ben\EcommerceBundle\Entity\UtilisateursAdresses;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class UtilisateursAdressesData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $utilisateursAdresses1 = new UtilisateursAdresses();
        $utilisateursAdresses1->setNom('benaata');
        $utilisateursAdresses1->setPrenom('rabii');
        $utilisateursAdresses1->setAdresse('16 rue dubois');
        $utilisateursAdresses1->setComplement('cordoliers');
        $utilisateursAdresses1->setCp('690002');
        $utilisateursAdresses1->setTelephone('0600000000');
        $utilisateursAdresses1->setPays('France');
        $utilisateursAdresses1->setVille('Lyon');
        $utilisateursAdresses1->setUtilisateur($this->getReference('utilisateur1'));


        $manager->persist($utilisateursAdresses1);



        $utilisateursAdresses2 = new UtilisateursAdresses();
        $utilisateursAdresses2->setNom('benayad');
        $utilisateursAdresses2->setPrenom('sara');
        $utilisateursAdresses2->setAdresse('16 rue dubois');
        $utilisateursAdresses2->setComplement('cordoliers');
        $utilisateursAdresses2->setCp('690002');
        $utilisateursAdresses2->setTelephone('0600000000');
        $utilisateursAdresses2->setPays('France');
        $utilisateursAdresses2->setVille('Lyon');
        $utilisateursAdresses2->setUtilisateur($this->getReference('utilisateur2'));


        $manager->persist($utilisateursAdresses2);




        $manager->flush();

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
        return 6;
    }
}