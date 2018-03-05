<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 24/05/17
 * Time: 09:41
 */

namespace Ben\EcommerceBundle\DataFixtures\ORM;


use Ben\EcommerceBundle\Entity\Produits;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class ProduitsData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

     /*   $produits1 = new Produits();
        $produits1->setNom('carottes');
        $produits1->setDescription('La carotte est une plante bisannuelle de la famille des apiacées, largement cultivée pour sa racine pivotante charnue, comestible, de couleur généralement orangée, ');
        $produits1->setDisponible('1');

        $produits1->setCategorie($this->getReference('categories1'));
        $produits1->setImage($this->getReference('media3'));
        $produits1->setPrix('6.8');
        $produits1->setTva($this->getReference('tva1'));
        $manager->persist($produits1);



        $produits2 = new Produits();
        $produits2->setNom('oignon');
        $produits2->setDescription(" L'oignon ou ognon  est une espèce de plante herbacée bisannuelle de la famille des Amaryllidaceae, largement et depuis longtemps cultivée comme plante potagère pour ses bulbes de saveur et d'odeur fortes et/ou pour ses feuilles ");
        $produits2->setDisponible('1');

        $produits2->setCategorie($this->getReference('categories1'));
        $produits2->setImage($this->getReference('media1'));
        $produits2->setPrix('4.8');
        $produits2->setTva($this->getReference('tva2'));
        $manager->persist($produits2);

        $produits3 = new Produits();
        $produits3->setNom('frais');
        $produits3->setDescription(" L'oignon ou ognon  est une espèce de plante herbacée bisannuelle de la famille des Amaryllidaceae, largement et depuis longtemps cultivée comme plante potagère pour ses bulbes de saveur et d'odeur fortes et/ou pour ses feuilles ");
        $produits3->setDisponible('1');

        $produits3->setCategorie($this->getReference('categories2'));
        $produits3->setImage($this->getReference('media5'));
        $produits3->setPrix('1.8');
        $produits3->setTva($this->getReference('tva1'));
        $manager->persist($produits3);


        $produits4 = new Produits();
        $produits4->setNom('pomme');
        $produits4->setDescription(" L'oignon ou ognon  est une espèce de plante herbacée bisannuelle de la famille des Amaryllidaceae, largement et depuis longtemps cultivée comme plante potagère pour ses bulbes de saveur et d'odeur fortes et/ou pour ses feuilles ");
        $produits4->setDisponible('1');

        $produits4->setCategorie($this->getReference('categories2'));
        $produits4->setImage($this->getReference('media6'));
        $produits4->setPrix('2.8');
        $produits4->setTva($this->getReference('tva2'));
        $manager->persist($produits4);

        $produits5 = new Produits();
        $produits5->setNom('banane');
        $produits5->setDescription(" L'oignon ou ognon  est une espèce de plante herbacée bisannuelle de la famille des Amaryllidaceae, largement et depuis longtemps cultivée comme plante potagère pour ses bulbes de saveur et d'odeur fortes et/ou pour ses feuilles ");
        $produits5->setDisponible('1');

        $produits5->setCategorie($this->getReference('categories2'));
        $produits5->setImage($this->getReference('media4'));
        $produits5->setPrix('1.8');
        $produits5->setTva($this->getReference('tva2'));

        $manager->persist($produits5);


        $produits6= new Produits();
        $produits6->setNom('orange');
        $produits6->setDescription(" orange ou ognon  est une espèce de plante herbacée bisannuelle de la famille des Amaryllidaceae, largement et depuis longtemps cultivée comme plante potagère pour ses bulbes de saveur et d'odeur fortes et/ou pour ses feuilles ");
        $produits6->setDisponible('1');

        $produits6->setCategorie($this->getReference('categories2'));
        $produits6->setImage($this->getReference('media7'));
        $produits6->setPrix('5.8');
        $produits6->setTva($this->getReference('tva1'));

        $manager->persist($produits6);


        $produits7= new Produits();
        $produits7->setNom('tomate');
        $produits7->setDescription(" L'oignon ou ognon  est une espèce de plante herbacée bisannuelle de la famille des Amaryllidaceae, largement et depuis longtemps cultivée comme plante potagère pour ses bulbes de saveur et d'odeur fortes et/ou pour ses feuilles ");
        $produits7->setDisponible('1');

        $produits7->setCategorie($this->getReference('categories1'));
        $produits7->setImage($this->getReference('media2'));
        $produits7->setPrix('12.8');
        $produits7->setTva($this->getReference('tva2'));



        $manager->persist($produits7);


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
        return 4;
    }
}