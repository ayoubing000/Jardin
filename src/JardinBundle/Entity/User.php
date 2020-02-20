<?php

namespace JardinBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as FosUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="JardinBundle\Repository\UserRepository")
 */
class User extends FosUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\OneToMany(targetEntity="InscriptionEvenement", mappedBy="user")
     */
    private $inscriptionEvenements;

    /**
     * @ORM\OneToMany(targetEntity="enfant", mappedBy="parent")
     */
    private $enfants;

    /**
     * @return ArrayCollection
     */
    public function getEnfants()
    {
        return $this->enfants;
    }

    /**
     * @param ArrayCollection $enfants
     */
    public function setEnfants($enfants)
    {
        $this->enfants = $enfants;
    }

    /**
     * @return mixed
     */
    public function getInscriptionEvenements()
    {
        return $this->inscriptionEvenements;
    }

    /**
     * @param mixed $inscriptionEvenements
     */
    public function setInscriptionEvenements($inscriptionEvenements)
    {
        $this->inscriptionEvenements = $inscriptionEvenements;
    }

    public function __construct()
    {
        parent::__construct();
        $this->enfants=new ArrayCollection();
    }

    /**
     * Sets the email.
     *
     * @param string $email
     * @return FosUser|\FOS\UserBundle\Model\UserInterface|User
     */
    public function setEmail($email)
    {
        $this->setUsername($email);

        return parent::setEmail($email);
    }

    /**
     * Set the canonical email.
     *
     * @param string $emailCanonical
     * @return FosUser|\FOS\UserBundle\Model\UserInterface|User
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->setUsernameCanonical($emailCanonical);

        return parent::setEmailCanonical($emailCanonical);
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }



}

