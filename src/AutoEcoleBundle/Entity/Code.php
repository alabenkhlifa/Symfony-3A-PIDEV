<?php

namespace AutoEcoleBundle\Entity;
use AutoEcoleBundle\Entity\Candidat;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Code
 *
 * @ORM\Table(name="code")
 * @ORM\Entity(repositoryClass="AutoEcoleBundle\Repository\CodeRepository")
 */
class Code
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
     * @ORM\Column(name="dateobtention", type="date", nullable=true)
     */
    private $dateobtention;

    /**
     * @ORM\OneToOne(targetEntity="AutoEcoleBundle\Entity\Candidat")
     */
    private $candidat;
    /**
     * @ORM\OneToMany(targetEntity="AutoEcoleBundle\Entity\Question", mappedBy="code")
     */
    private $questions;

    /**
     * @return mixed
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @param mixed $questions
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
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
     * Set dateobtention
     *
     * @param \DateTime $dateobtention
     *
     * @return Code
     */
    public function setDateobtention($dateobtention)
    {
        $this->dateobtention = $dateobtention;

        return $this;
    }

    /**
     * Get dateobtention
     *
     * @return \DateTime
     */
    public function getDateobtention()
    {
        return $this->dateobtention;
    }

    /**
     * Set candidat
     *
     * @param Candidat $candidat
     *
     * @return Code
     */
    public function setCandidat($candidat)
    {
        $this->candidat = $candidat;

        return $this;
    }

    /**
     * Get candidat
     *
     * @return Candidat
     */
    public function getCandidat()
    {
        return $this->candidat;
    }

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }
}

