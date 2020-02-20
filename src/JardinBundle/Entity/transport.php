<?php

namespace JardinBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * transport
 *
 * @ORM\Table(name="transport")
 * @ORM\Entity(repositoryClass="JardinBundle\Repository\transportRepository")
 */
class transport
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime" , nullable= true)
     */

        private $dateDebut;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime" , nullable=true )
     */
    private $dateFin;

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param DateTime $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param DateTime $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return ArrayCollection
     */
    public function getEnfants(): ArrayCollection
    {
        return $this->enfants;
    }

    /**
     * @param ArrayCollection $enfants
     */
    public function setEnfants(ArrayCollection $enfants)
    {
        $this->enfants = $enfants;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="nbr_bus", type="integer")
     */
    private $nbrBus;

    /**
     * @ORM\OneToMany(targetEntity="employee", mappedBy="transport")
     * @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     */
    private $employee;
    /**
     * @ORM\OneToMany(targetEntity="enfant", mappedBy="transport")
     * @ORM\JoinColumn(name="enfant_id", referencedColumnName="id")
     */
    private $enfants;

    public function __construct() {
        $this->employee = new ArrayCollection();
        $this->enfants = new ArrayCollection();

    }


    /**
     * @param mixed $employee
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_enfant", type="integer")
     */
    private $nbrEnfant;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=255)
     */
    private $destination;


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
     * Set nbrBus
     *
     * @param integer $nbrBus
     *
     * @return transport
     */
    public function setNbrBus($nbrBus)
    {
        $this->nbrBus = $nbrBus;

        return $this;
    }

    /**
     * Get nbrBus
     *
     * @return int
     */
    public function getNbrBus()
    {
        return $this->nbrBus;
    }

    /**
     * Set nbrEnfant
     *
     * @param integer $nbrEnfant
     *
     * @return transport
     */
    public function setNbrEnfant($nbrEnfant)
    {
        $this->nbrEnfant = $nbrEnfant;

        return $this;
    }

    /**
     * Get nbrEnfant
     *
     * @return int
     */
    public function getNbrEnfant()
    {
        return $this->nbrEnfant;
    }

    /**
     * Set destination
     *
     * @param string $destination
     *
     * @return transport
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }
}

