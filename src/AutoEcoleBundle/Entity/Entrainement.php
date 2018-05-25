<?php

namespace AutoEcoleBundle\Entity;
use AutoEcoleBundle\Entity\Candidat;
use AutoEcoleBundle\Entity\Moniteur;
use AutoEcoleBundle\Entity\Voiture;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entrainement
 *
 * @ORM\Table(name="entrainement")
 * @ORM\Entity(repositoryClass="AutoEcoleBundle\Repository\EntrainementRepository")
 */
class Entrainement
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
     * @ORM\ManyToOne(targetEntity="AutoEcoleBundle\Entity\Candidat", inversedBy="entainement")
     * @ORM\JoinColumn(name="candidate_id", referencedColumnName="id")
     */
    private $candidat;

    /**
     * @ORM\ManyToOne(targetEntity="AutoEcoleBundle\Entity\Moniteur", inversedBy="entrainements")
     * @ORM\JoinColumn(name="moniteur_id", referencedColumnName="id")
     */
    private $moniteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateentrainement", type="datetime")
     */
    private $dateentrainement;

    /**
     * @ORM\ManyToOne(targetEntity="AutoEcoleBundle\Entity\Voiture", inversedBy="entrainements")
     * @ORM\JoinColumn(name="voiture_id", referencedColumnName="id")
     */
    private $voiture;
    /**
     * @var Boolean
     *
     * @ORM\Column(name="approuve", type="boolean")
     */

    private $approuve;

    /**
     * @ORM\OneToOne(targetEntity="AutoEcoleBundle\Entity\Annulation")
     * @ORM\JoinColumn(name="annulation_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $annulation;

    /**
     * @return mixed
     */
    public function getAnnulation()
    {
        return $this->annulation;
    }

    /**
     * @param mixed $annulation
     */
    public function setAnnulation($annulation)
    {
        $this->annulation = $annulation;
    }



    /**
     * @return bool
     */
    public function isApprouve()
    {
        return $this->approuve;
    }

    /**
     * @param bool $approuve
     */
    public function setApprouve($approuve)
    {
        $this->approuve = $approuve;
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
     * Set candidat
     *
     * @param Candidat $candidat
     *
     * @return Entrainement
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

    /**
     * Set moniteur
     *
     * @param Moniteur $moniteur
     *
     * @return Entrainement
     */
    public function setMoniteur($moniteur)
    {
        $this->moniteur = $moniteur;

        return $this;
    }

    /**
     * Get Moniteur
     *
     * @return string
     */
    public function getMoniteur()
    {
        return $this->moniteur;
    }

    /**
     * Set dateentrainement
     *
     * @param \DateTime $dateentrainement
     *
     * @return Entrainement
     */
    public function setDateentrainement($dateentrainement)
    {
        $this->dateentrainement = $dateentrainement;

        return $this;
    }

    /**
     * Get dateentrainement
     *
     * @return \DateTime
     */
    public function getDateentrainement()
    {
        return $this->dateentrainement;
    }

    /**
     * Set Voiture
     *
     * @param string $voiture
     *
     * @return Entrainement
     */
    public function setVoiture($voiture)
    {
        $this->voiture = $voiture;

        return $this;
    }

    /**
     * Get voiture
     *
     * @return Voiture
     */
    public function getVoiture()
    {
        return $this->voiture;
    }

}

