<?php

namespace JardinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="JardinBundle\Repository\CommentaireRepository")
 */
class Commentaire
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
     * @ORM\Column(name="contenue", type="text", nullable=true)
     */
    private $contenue;
    /**
     * @ORM\ManyToOne(targetEntity="Repa")
     * @ORM\JoinColumn(name="id_repa",referencedColumnName="id")
     */
    private $repa;

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
     * Set contenue
     *
     * @param string $contenue
     *
     * @return Commentaire
     */
    public function setContenue($contenue)
    {
        $this->contenue = $contenue;

        return $this;
    }
        /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreate", type="datetime", nullable=true)
     */
    private $datecreate;
    /**
     * Get contenue
     *
     * @return string
     */
    public function getContenue()
    {
        return $this->contenue;
    }

            /**
     * @return mixed
     */
    public function getRepa()
    {
        return $this->repa;
    }

    /**
     * @param mixed $repa
     */
    public function setRepa($repa)
    {
        $this->repa = $repa;
    }
            /**
     * @return \DateTime
     */
    public function getDatecreate()
    {
        return $this->datecreate;
    }

    /**
     * @param \DateTime $datecreate
     */
    public function setDatecreate($datecreate)
    {
        $this->datecreate = $datecreate;
    }

 /**
     * @ORM\Column(type="integer",length=11, nullable=true)
     */
    private $rating;


        /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }
}

