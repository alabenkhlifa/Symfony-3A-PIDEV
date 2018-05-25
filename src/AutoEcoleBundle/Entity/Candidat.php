<?php

namespace AutoEcoleBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use AutoEcoleBundle\AutoEcoleBundle;
use AutoEcoleBundle\Entity\Code;
use AutoEcoleBundle\Entity\Permis;
use Doctrine\ORM\Mapping as ORM;

/**
 * Candidat
 *
 * @ORM\Table(name="candidat")
 * @ORM\Entity(repositoryClass="AutoEcoleBundle\Repository\CandidatRepository")
 */
class Candidat extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255, unique=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="motdepasse", type="string", length=255, unique=true)
     */
    private $motdepasse;

    /**
     * @ORM\OneToOne(targetEntity="AutoEcoleBundle\Entity\Permis")
     */
    private $permis;

    /**
     * @ORM\OneToOne(targetEntity="AutoEcoleBundle\Entity\Code")
     */
    private $code;
    /**
     * @ORM\OneToMany(targetEntity="AutoEcoleBundle\Entity\Entrainement", mappedBy="candidat")
     */
    private $entrainements;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEntrainements()
    {
        return $this->entrainements;
    }

    /**
     * @param mixed $entrainements
     */
    public function setEntrainements($entrainements)
    {
        $this->entrainements = $entrainements;
    }



    /**
     * @return string
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * @param string $motdepasse
     */
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;
    }
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Candidat
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
     * @return Candidat
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
     * Set cin
     *
     * @param string $cin
     *
     * @return Candidat
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set permis
     *
     * @param Permis $permis
     *
     * @return Candidat
     */
    public function setPermis($permis)
    {
        $this->permis = $permis;

        return $this;
    }

    /**
     * Get permis
     *
     * @return Permis
     */
    public function getPermis()
    {
        return $this->permis;
    }

    /**
     * Set code
     *
     * @param Code $code
     *
     * @return Candidat
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return Code
     */
    public function getCode()
    {
        return $this->code;
    }

    public function __construct()
    {
        parent::__construct();
    }
}

