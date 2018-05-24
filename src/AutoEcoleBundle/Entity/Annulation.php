<?php

namespace AutoEcoleBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Annulation
 *
 * @ORM\Table(name="annulation")
 * @ORM\Entity(repositoryClass="AutoEcoleBundle\Repository\AnnulationRepository")
 */
class Annulation
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
     * @ORM\OneToOne(targetEntity="AutoEcoleBundle\Entity\Entrainement")
     */
    private $entrainement;

    /**
     * @var datetime
     *
     * @ORM\Column(name="dateAnnulation", type="datetime")
     */
    private $dateAnnulation;

    /**
     * @var string
     *
     * @ORM\Column(name="raison", type="string", length=255)
     */
    private $raison;

    /**
     * @var bool
     *
     * @ORM\Column(name="approuve", type="boolean")
     */
    private $approuve;

    /**
     * @var bool
     *
     * @ORM\Column(name="postedby", type="boolean")
     */
    private $postedby;

    /**
     * @return bool
     */
    public function isPostedby()
    {
        return $this->postedby;
    }

    /**
     * @param bool $postedby
     */
    public function setPostedby($postedby)
    {
        $this->postedby = $postedby;
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
     * Set entrainement
     *
     * @param string $entrainement
     *
     * @return Annulation
     */
    public function setEntrainement($entrainement)
    {
        $this->entrainement = $entrainement;

        return $this;
    }

    /**
     * Get entrainement
     *
     * @return string
     */
    public function getEntrainement()
    {
        return $this->entrainement;
    }

    /**
     * Set dateAnnulation
     *
     * @param datetime $dateAnnulation
     *
     * @return Annulation
     */
    public function setDateAnnulation($dateAnnulation)
    {
        $this->dateAnnulation = $dateAnnulation;

        return $this;
    }

    /**
     * Get dateAnnulation
     *
     * @return datetime
     */
    public function getDateAnnulation()
    {
        return $this->dateAnnulation;
    }

    /**
     * Set raison
     *
     * @param string $raison
     *
     * @return Annulation
     */
    public function setRaison($raison)
    {
        $this->raison = $raison;

        return $this;
    }

    /**
     * Get raison
     *
     * @return string
     */
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * Set approuve
     *
     * @param boolean $approuve
     *
     * @return Annulation
     */
    public function setApprouve($approuve)
    {
        $this->approuve = $approuve;

        return $this;
    }

    /**
     * Get approuve
     *
     * @return bool
     */
    public function getApprouve()
    {
        return $this->approuve;
    }
}

