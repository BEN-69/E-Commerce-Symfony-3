<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 24/05/17
 * Time: 09:41
 */

namespace Ben\EcommerceBundle\DataFixtures\ORM;


use Ben\EcommerceBundle\Entity\Categories;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class CategoriesData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

     /*   $categories1 = new Categories();
        $categories1->setNom('Légumes');
        $categories1->setImage($this->getReference('media1'));
        $manager->persist($categories1);

        $categories2 = new Categories();
        $categories2->setNom('Fruites');
        $categories2->setImage($this->getReference('media2'));
        $manager->persist($categories2);


        $categories3 = new Categories();
        $categories3->setNom('Bio');
        $categories3->setImage($this->getReference('media3'));
        $manager->persist($categories3);

        $manager->flush();

        $this->addReference('categories1',$categories1);
        $this->addReference('categories2',$categories2);
        $this->addReference('categories3',$categories3);
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