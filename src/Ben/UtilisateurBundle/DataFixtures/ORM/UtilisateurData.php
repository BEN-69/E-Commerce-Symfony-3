<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 24/05/17
 * Time: 09:41
 */

namespace Ben\UtilisateurBundle\DataFixtures\ORM;


use Ben\UtilisateurBundle\Entity\Utilisateur;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class UtilisateurData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {

        $Utilisateur1 = new Utilisateur();
        $Utilisateur1->setUsername('sara');

        $Utilisateur1->setEmail('sara@gmail.com');
        $Utilisateur1->setEnabled('1');


        $Utilisateur1->setSalt(md5(uniqid()));
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($Utilisateur1, 'sara');
        $Utilisateur1->setPassword($password);

        $manager->persist($Utilisateur1);




        $Utilisateur2 = new Utilisateur();
        $Utilisateur2->setUsername('rabii');
        $Utilisateur2->setSalt(md5(uniqid()));
        $Utilisateur2->setEmail('r.benaata@gmail.com');
        $Utilisateur2->setEnabled('1');
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($Utilisateur2, 'rabii');
        $Utilisateur2->setPassword($password);

        $manager->persist($Utilisateur2);


        $Utilisateur3 = new Utilisateur();
        $Utilisateur3->setUsername('ayoub');
        $Utilisateur3->setSalt(md5(uniqid()));
        $Utilisateur3->setEmail('ayoub@gmail.com');
        $Utilisateur3->setEnabled('1');
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($Utilisateur3, 'ayoub');
        $Utilisateur3->setPassword($password);

        $manager->persist($Utilisateur3);


        $manager->flush();



        $this->addReference('utilisateur1', $Utilisateur1);
        $this->addReference('utilisateur2', $Utilisateur2);
        $this->addReference('utilisateur3', $Utilisateur3);
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
        return 5;
    }
}