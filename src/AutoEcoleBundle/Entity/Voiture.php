<?php

namespace AutoEcoleBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Voiture
 *
 * @ORM\Table(name="voiture")
 * @ORM\Entity(repositoryClass="AutoEcoleBundle\Repository\VoitureRepository")
 */
class Voiture
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
     * @ORM\Column(name="immatricule", type="string", length=255, unique=true)
     */
    private $immatricule;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=255)
     */
    private $modele;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\OneToMany(targetEntity="AutoEcoleBundle\Entity\Entrainement", mappedBy="voiture")
     */
    private $entrainements;

    /**
     * @ORM\OneToMany(targetEntity="AutoEcoleBundle\Entity\Permis", mappedBy="voiture")
     */
    private $permis;

    /**
     * @var int
     *
     * @ORM\Column(name="cout", type="integer")
     */
    private $cout;

    /**
     * @return int
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * @param int $cout
     */
    public function setCout($cout)
    {
        $this->cout = $cout;
    }



    /**
     * @return mixed
     */
    public function getPermis()
    {
        return $this->permis;
    }

    /**
     * @param mixed $permis
     */
    public function setPermis($permis)
    {
        $this->permis = $permis;
    }



    /**
     * @return ArrayCollection
     */
    public function getEntrainements()
    {
        return $this->entrainements;
    }

    /**
     * @param ArrayCollection $entrainements
     */
    public function setEntrainements($entrainements)
    {
        $this->entrainements = $entrainements;
    }

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
     * Set immatricule
     *
     * @param string $immatricule
     *
     * @return Voiture
     */
    public function setImmatricule($immatricule)
    {
        $this->immatricule = $immatricule;

        return $this;
    }

    /**
     * Get immatricule
     *
     * @return string
     */
    public function getImmatricule()
    {
        return $this->immatricule;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Voiture
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set modele
     *
     * @param string $modele
     *
     * @return Voiture
     */
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return string
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Voiture
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Voiture
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    public function __construct()
    {
        $this->entrainements = new ArrayCollection();
        $this->permis = new ArrayCollection();
    }
}

