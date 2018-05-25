<?php

namespace AutoEcoleBundle\Entity;
use AutoEcoleBundle\Entity\Candidat;
use Doctrine\ORM\Mapping as ORM;

/**
 * Permis
 *
 * @ORM\Table(name="permis")
 * @ORM\Entity(repositoryClass="AutoEcoleBundle\Repository\PermisRepository")
 */
class Permis
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateTest", type="datetime")
     */
    private $dateTest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateObtention", type="date", nullable=true)
     */
    private $dateObtention;

    /**
     * @ORM\OneToOne(targetEntity="AutoEcoleBundle\Entity\Candidat")
     */
    private $candidat;
    /**
     * @ORM\ManyToOne(targetEntity="AutoEcoleBundle\Entity\Voiture", inversedBy="permis")
     * @ORM\JoinColumn(name="voiture_id", referencedColumnName="id")
     */
    private $voiture;

    /**
     * @return mixed
     */
    public function getVoiture()
    {
        return $this->voiture;
    }

    /**
     * @param mixed $voiture
     */
    public function setVoiture($voiture)
    {
        $this->voiture = $voiture;
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
     * Set dateTest
     *
     * @param \DateTime $dateTest
     *
     * @return Permis
     */
    public function setDateTest($dateTest)
    {
        $this->dateTest = $dateTest;

        return $this;
    }

    /**
     * Get dateTest
     *
     * @return \DateTime
     */
    public function getDateTest()
    {
        return $this->dateTest;
    }

    /**
     * Set dateObtention
     *
     * @param \DateTime $dateObtention
     *
     * @return Permis
     */
    public function setDateObtention($dateObtention)
    {
        $this->dateObtention = $dateObtention;

        return $this;
    }

    /**
     * Get dateObtention
     *
     * @return \DateTime
     */
    public function getDateObtention()
    {
        return $this->dateObtention;
    }

    /**
     * Set candidat
     *
     * @param Candidat $candidat
     *
     * @return Permis
     */
    public function setCandidat($candidat)
    {
        $this->candidat = $candidat;

        return $this;
    }

    /**
     * Get Candidat
     *
     * @return string
     */
    public function getCandidat()
    {
        return $this->candidat;
    }

}

