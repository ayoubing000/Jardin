<?php

namespace JardinBundle\Entity;
use FOS\UserBundle\Model\User as FosUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="JardinBundle\Repository\employeeRepository")
 */
class employee extends FosUser
{
    /**
     * @return mixed
     */
    public function getContrats()
    {
        return $this->contrats;
    }

    /**
     * @param mixed $contrats
     */
    public function setContrats($contrats)
    {
        $this->contrats = $contrats;
    }

    /**
     * @return mixed
     */
    public function getEmplois()
    {
        return $this->emplois;
    }

    /**
     * @param mixed $emplois
     */
    public function setEmplois($emplois)
    {
        $this->emplois = $emplois;
    }
    // ...

    /**
 * @ORM\ManyToOne(targetEntity="JardinBundle\Entity\contrat", inversedBy="employ")
 */
    private $contrats;
    /**
     * @ORM\ManyToOne(targetEntity="JardinBundle\Entity\emploi", inversedBy="employees")
     */
    private $emplois;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cin", type="integer")
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="diplomes", type="string", length=255)
     */
    private $diplomes;
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=255)
     */
    private $cv;

    /**
     * @var string
     *
     * @ORM\Column(name="inf_sup", type="string", length=255)
     */
    private $infSup;


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
     * Set cin
     *
     * @param integer $cin
     *
     * @return employee
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return int
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set diplomes
     *
     * @param string $diplomes
     *
     * @return employee
     */
    public function setDiplomes($diplomes)
    {
        $this->diplomes = $diplomes;

        return $this;
    }

    /**
     * Get diplomes
     *
     * @return string
     */
    public function getDiplomes()
    {
        return $this->diplomes;
    }

    /**
     * Set cv
     *
     * @param string $cv
     *
     * @return employee
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set infSup
     *
     * @param string $infSup
     *
     * @return employee
     */
    public function setInfSup($infSup)
    {
        $this->infSup = $infSup;

        return $this;
    }

    /**
     * Get infSup
     *
     * @return string
     */
    public function getInfSup()
    {
        return $this->infSup;
    }
}

