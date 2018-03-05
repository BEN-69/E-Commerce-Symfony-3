<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 24/05/17
 * Time: 09:41
 */

namespace Ben\EcommerceBundle\DataFixtures\ORM;


use Ben\EcommerceBundle\Entity\Media;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class MediaData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        /*$media1 = new Media();
        $media1->setAlt('ogion');
        $media1->setPath('http://www.lesfruitsetlegumesfrais.com/_upload/cache/ressources/produits/oignon/oignon_346_346_filled.jpg');
        $manager->persist($media1);

        $media2 = new Media();
        $media2->setAlt('tomate');
        $media2->setPath('http://www.by.all.biz/img/by/catalog/96389.png');
        $manager->persist($media2);

        $media3 = new Media();
        $media3->setAlt('carottes');
        $media3->setPath('http://www.iltuoallenamento.it/wp-content/uploads/2013/04/carote.png');
        $manager->persist($media3);

        $media4 = new Media();
        $media4->setAlt('banane');
        $media4->setPath('http://www.hindimeaning.com/pictures/fruits/banana.jpg');
        $manager->persist($media4);

        $media5 = new Media();
        $media5->setAlt('frais');
        $media5->setPath('http://flowerstore.gr/image/cache/catalog/fraoela-sporoi-0-15gr-156-630x552.jpg');
        $manager->persist($media5);

        $media6 = new Media();
        $media6->setAlt('pomme');
        $media6->setPath('http://www.womenshealthmag.com/sites/womenshealthmag.com/files/2015/08/04/shutterstock_127612211_0_0.jpg');
        $manager->persist($media6);


        $media7 = new Media();
        $media7->setAlt('orange');
        $media7->setPath(' http://www.westernwholesalers.com.au/images/products/ip005975.jpg');
        $manager->persist($media7);

        $manager->flush();

        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);

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
        return 2;
    }
}