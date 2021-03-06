<?php

namespace JardinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * facture
 *
 * @ORM\Table(name="facture")
 * @ORM\Entity(repositoryClass="JardinBundle\Repository\factureRepository")
 */
class facture
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
     * @ORM\Column(name="date_paiment", type="date")
     */
    private $datePaiment;

    /**
     * @ORM\OneToMany(targetEntity="abonnement" , mappedBy="factures")
     * @ORM\JoinColumn(name="abn_id",referencedColumnName="id")
     */

    private $abn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date")
     */
    private $dateCreation;


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
     * Set datePaiment
     *
     * @param string $datePaiment
     *
     * @return facture
     */
    public function setDatePaiment($datePaiment)
    {
        $this->datePaiment = $datePaiment;

        return $this;
    }

    /**
     * Get datePaiment
     *
     * @return string
     */
    public function getDatePaiment()
    {
        return $this->datePaiment;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return facture
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @return mixed
     */
    public function getAbn()
    {
        return $this->abn;
    }

    /**
     * @param mixed $abn
     */
    public function setAbn($abn)
    {
        $this->abn = $abn;
    }

}

