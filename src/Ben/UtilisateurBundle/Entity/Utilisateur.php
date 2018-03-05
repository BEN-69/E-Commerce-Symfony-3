<?php
/**
 * Created by PhpStorm.
 * User: rabii
 * Date: 19/05/17
 * Time: 14:13
 */

namespace Ben\UtilisateurBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateurs")
 */
class Utilisateur extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->commandes = new ArrayCollection();
        $this->adresses = new ArrayCollection();
    }

    /**
     *
     * @ORM\OneToMany(targetEntity="Ben\EcommerceBundle\Entity\Commandes", mappedBy="utilisateur" )
     *
     */
    private $commandes;



    /**
     *
     * @ORM\OneToMany(targetEntity="Ben\EcommerceBundle\Entity\UtilisateursAdresses", mappedBy="utilisateur" )
     *
     */
    private $adresses;





    /**
     * Add commande
     *
     * @param \Ben\EcommerceBundle\Entity\Commandes $commande
     *
     * @return Utilisateur
     */
    public function addCommande(\Ben\EcommerceBundle\Entity\Commandes $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \Ben\EcommerceBundle\Entity\Commandes $commande
     */
    public function removeCommande(\Ben\EcommerceBundle\Entity\Commandes $commande)
    {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Add adress
     *
     * @param \Ben\EcommerceBundle\Entity\UtilisateursAdresses $adress
     *
     * @return Utilisateur
     */
    public function addAdress(\Ben\EcommerceBundle\Entity\UtilisateursAdresses $adress)
    {
        $this->adresses[] = $adress;

        return $this;
    }

    /**
     * Remove adress
     *
     * @param \Ben\EcommerceBundle\Entity\UtilisateursAdresses $adress
     */
    public function removeAdress(\Ben\EcommerceBundle\Entity\UtilisateursAdresses $adress)
    {
        $this->adresses->removeElement($adress);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdresses()
    {
        return $this->adresses;
    }
}
