<?php

namespace Ben\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Produits
 *
 * @ORM\Table(name="produits")
 * @ORM\Entity(repositoryClass="Ben\EcommerceBundle\Repository\ProduitsRepository")
 * @UniqueEntity(fields="nom", message="Ce projuit existe déjà avec ce nom.")
 */
class Produits
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=125)
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\Length(min=2)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var bool
     *
     * @ORM\Column(name="disponible", type="boolean")
     */
    private $disponible;



    /**
     *
     *
     * @ORM\OneToOne(targetEntity="Ben\EcommerceBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="image_id",referencedColumnName="id")
     *
     */
    private $image;


    /**
     *
     * @ORM\ManyToOne(targetEntity="Ben\EcommerceBundle\Entity\Tva",cascade={"persist"} )
     * @ORM\JoinColumn(name="tva_id",referencedColumnName="id")
     *
     */
    private $tva;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Ben\EcommerceBundle\Entity\Categories",cascade={"persist"} )
     * @ORM\JoinColumn(name="categorie_id",referencedColumnName="id")
     *
     */
    private $categorie;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Produits
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produits
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Produits
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set disponible
     *
     * @param boolean $disponible
     *
     * @return Produits
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return bool
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set image
     *
     * @param \Ben\EcommerceBundle\Entity\Media $image
     *
     * @return Produits
     */
    public function setImage(\Ben\EcommerceBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Ben\EcommerceBundle\Entity\Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set tva
     *
     * @param \Ben\EcommerceBundle\Entity\Tva $tva
     *
     * @return Produits
     */
    public function setTva(\Ben\EcommerceBundle\Entity\Tva $tva = null)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return int
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set categorie
     *
     * @param \Ben\EcommerceBundle\Entity\Categories $categorie
     *
     * @return Produits
     */
    public function setCategorie(\Ben\EcommerceBundle\Entity\Categories $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Ben\EcommerceBundle\Entity\Categories
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
