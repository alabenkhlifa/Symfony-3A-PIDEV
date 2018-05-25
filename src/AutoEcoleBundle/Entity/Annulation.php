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
     * @ORM\JoinColumn(name="entrainement_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $entrainement;

    /**
     * @var datetime
     *
     * @ORM\Column(name="dateAnnulation", type="datetime")
     */
    private $dateAnnulation;

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

}

