<?php

namespace JardinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * abonnement
 *
 * @ORM\Table(name="abonnement")
 * @ORM\Entity(repositoryClass="JardinBundle\Repository\abonnementRepository")
 */
class abonnement
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
     * @ORM\Column(name="data_debut", type="date")
     */
    private $dataDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="enfant" , inversedBy="abonnment")
     * @ORM\JoinColumn(name="enf_id",referencedColumnName="id")
     */

    private  $enfant;


    /**
     * @ORM\ManyToOne(targetEntity="facture" , inversedBy="abn")
     * @ORM\JoinColumn(name="facture_id",referencedColumnName="id")
     */

    private  $factures;


    /**
     * @return mixed
     */
    public function getEnfant()
    {
        return $this->enfant;
    }

    /**
     * @param mixed $enfant
     */
    public function setEnfant($enfant)
    {
        $this->enfant = $enfant;
    }

    /**
     * @return mixed
     */
    public function getFactures()
    {
        return $this->factures;
    }

    /**
     * @param mixed $factures
     */
    public function setFactures($factures)
    {
        $this->factures = $factures;
    }

    /**
     * @return mixed
     */


    /**
     * @param mixed $parents
     */


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
     * Set dataDebut
     *
     * @param \DateTime $dataDebut
     *
     * @return abonnement
     */
    public function setDataDebut($dataDebut)
    {
        $this->dataDebut = $dataDebut;

        return $this;
    }

    /**
     * Get dataDebut
     *
     * @return \DateTime
     */
    public function getDataDebut()
    {
        return $this->dataDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return abonnement
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return abonnement
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

    /**
     * Set description
     *
     * @param string $description
     *
     * @return abonnement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

