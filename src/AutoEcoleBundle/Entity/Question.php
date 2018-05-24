<?php

namespace AutoEcoleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AutoEcoleBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="reponse1", type="string", length=255)
     */
    private $reponse1;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse2", type="string", length=255)
     */
    private $reponse2;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse3", type="string", length=255)
     */
    private $reponse3;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse4", type="string", length=255)
     */
    private $reponse4;


    /**
     * @ORM\ManyToOne(targetEntity="AutoEcoleBundle\Entity\Code", inversedBy="questions")
     * @ORM\JoinColumn(name="code_id", referencedColumnName="id")
     */
    private $code;


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
     * Set reponse1
     *
     * @param string $reponse1
     *
     * @return Question
     */
    public function setReponse1($reponse1)
    {
        $this->reponse1 = $reponse1;

        return $this;
    }

    /**
     * Get reponse1
     *
     * @return string
     */
    public function getReponse1()
    {
        return $this->reponse1;
    }

    /**
     * Set reponse2
     *
     * @param string $reponse2
     *
     * @return Question
     */
    public function setReponse2($reponse2)
    {
        $this->reponse2 = $reponse2;

        return $this;
    }

    /**
     * Get reponse2
     *
     * @return string
     */
    public function getReponse2()
    {
        return $this->reponse2;
    }

    /**
     * Set reponse3
     *
     * @param string $reponse3
     *
     * @return Question
     */
    public function setReponse3($reponse3)
    {
        $this->reponse3 = $reponse3;

        return $this;
    }

    /**
     * Get reponse3
     *
     * @return string
     */
    public function getReponse3()
    {
        return $this->reponse3;
    }

    /**
     * Set reponse4
     *
     * @param string $reponse4
     *
     * @return Question
     */
    public function setReponse4($reponse4)
    {
        $this->reponse4 = $reponse4;

        return $this;
    }

    /**
     * Get reponse4
     *
     * @return string
     */
    public function getReponse4()
    {
        return $this->reponse4;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Question
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}

