<?php

namespace AutoEcoleBundle\Entity;
use AutoEcoleBundle\Entity\Entrainement;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Moniteur
 *
 * @ORM\Table(name="moniteur")
 * @ORM\Entity(repositoryClass="AutoEcoleBundle\Repository\MoniteurRepository")
 */
class Moniteur
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity="AutoEcoleBundle\Entity\Entrainement", mappedBy="moniteur")
     */
    private $entrainements;


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
     * @return Moniteur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Moniteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set entrainement
     *
     * @param ArrayCollection $entrainements
     *
     * @return Moniteur
     */
    public function setEntrainements($entrainements)
    {
        $this->entrainement = $entrainements;

        return $this;
    }

    /**
     * Get entrainements
     *
     * @return ArrayCollection
     */
    public function getEntrainements()
    {
        return $this->entrainements;
    }

    public function __construct()
    {
        $this->entrainements = new ArrayCollection();
    }
}

