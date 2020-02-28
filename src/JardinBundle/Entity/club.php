<?php

namespace JardinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="JardinBundle\Repository\clubRepository")
 */
class club
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var array
     *
     * @ORM\Column(name="activite", type="string", length=255)
     */
    private $activite;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="enfant",mappedBy="club")
     * @ORM\JoinColumn(name="club_id",referencedColumnName="id")
     */

    private  $enfants ;

    /**
     * @return mixed
     */
    public function getEnfants()
    {
        return $this->enfants;
    }

    /**
     * @param mixed $enfants
     */
    public function setEnfants($enfants)
    {
        $this->enfants = $enfants;
    }

    /**
     * @ORM\OneToMany(targetEntity="competition",mappedBy="club")
     * @ORM\JoinColumn(name="club_id",referencedColumnName="id")
     */

    private  $compet ;

    /**
     * @return mixed
     */
    public function getCompet()
    {
        return $this->compet;
    }

    /**
     * @param mixed $compet
     */
    public function setCompet($compet)
    {
        $this->compet = $compet;
    }

    /**
     * @ORM\OneToMany(targetEntity="employee",mappedBy="club")
     * @ORM\JoinColumn(name="club_id",referencedColumnName="id")
     */

    private  $employes ;

    /**
     * @return mixed
     */
    public function getEmployes()
    {
        return $this->employes;
    }

    /**
     * @param mixed $employes
     */
    public function setEmployes($employes)
    {
        $this->employes = $employes;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return club
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
     * Set activite
     *
     * @param string $activite
     *
     * @return club
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return string
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return club
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    public function __toString()
    {
        return (String) $this->id;
    }
}

