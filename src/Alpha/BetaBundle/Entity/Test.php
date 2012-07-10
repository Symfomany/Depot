<?php

namespace Alpha\BetaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alpha\BetaBundle\Entity\Test
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="Alpha\BetaBundle\Repository\TestRepository")
 */
class Test {

    /**
     * @var bigint $id
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length="255")
     *
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length="255", nullable=false)
     *
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string")
     *
     */
    protected $email;


    /**
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
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
     * Set email
     *
     * @param email $email
     */
    public function setEmail( $email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return email 
     */
    public function getEmail()
    {
        return $this->email;
    }
}