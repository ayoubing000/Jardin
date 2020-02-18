<?php

namespace JardinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * enfant
 *
 * @ORM\Table(name="enfant")
 * @ORM\Entity(repositoryClass="JardinBundle\Repository\enfantRepository")
 */
class enfant
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
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissaince", type="date")
     */
    private $dateNaissaince;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @ORM\OneToOne(targetEntity="abonnement", inversedBy="enfant")
     * @ORM\JoinColumn(name="matricul_abn", referencedColumnName="id")
     */

    private  $abonnment;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="enfants")
     * @ORM\JoinColumn(name="matricul_prt", referencedColumnName="id")
     */

    private  $parents;


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
     * @return enfant
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
     * @return enfant
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
     * Set dateNaissaince
     *
     * @param \DateTime $dateNaissaince
     *
     * @return enfant
     */
    public function setDateNaissaince($dateNaissaince)
    {
        $this->dateNaissaince = $dateNaissaince;

        return $this;
    }

    /**
     * Get dateNaissaince
     *
     * @return \DateTime
     */
    public function getDateNaissaince()
    {
        return $this->dateNaissaince;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return enfant
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return enfant
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getAbonnment()
    {
        return $this->abonnment;
    }

    /**
     * @param mixed $abonnment
     */
    public function setAbonnment($abonnment)
    {
        $this->abonnment = $abonnment;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parents;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parents)
    {
        $this->parents = $parents;
    }

}

