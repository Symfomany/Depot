<?php

namespace Alpha\BetaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alpha\BetaBundle\Entity\Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity
 */
class Departement
{
    /**
     * @var integer $idDepartement
     *
     * @ORM\Column(name="id_departement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDepartement;

    /**
     * @var integer $idRegion
     *
     * @ORM\Column(name="id_region", type="integer", nullable=false)
     */
    private $idRegion;

    /**
     * @var string $code
     *
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code;

    /**
     * @var string $nomDepartement
     *
     * @ORM\Column(name="nom_departement", type="string", length=250, nullable=false)
     */
    private $nomDepartement;



    /**
     * Get idDepartement
     *
     * @return integer 
     */
    public function getIdDepartement()
    {
        return $this->idDepartement;
    }

    /**
     * Set idRegion
     *
     * @param integer $idRegion
     */
    public function setIdRegion($idRegion)
    {
        $this->idRegion = $idRegion;
    }

    /**
     * Get idRegion
     *
     * @return integer 
     */
    public function getIdRegion()
    {
        return $this->idRegion;
    }

    /**
     * Set code
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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

    /**
     * Set nomDepartement
     *
     * @param string $nomDepartement
     */
    public function setNomDepartement($nomDepartement)
    {
        $this->nomDepartement = $nomDepartement;
    }

    /**
     * Get nomDepartement
     *
     * @return string 
     */
    public function getNomDepartement()
    {
        return $this->nomDepartement;
    }
}