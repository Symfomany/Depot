<?php

namespace Alpha\BetaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alpha\BetaBundle\Entity\Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity
 */
class Region
{
    /**
     * @var integer $idRegion
     *
     * @ORM\Column(name="id_region", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRegion;

    /**
     * @var string $nomRegion
     *
     * @ORM\Column(name="nom_region", type="string", length=250, nullable=false)
     */
    private $nomRegion;



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
     * Set nomRegion
     *
     * @param string $nomRegion
     */
    public function setNomRegion($nomRegion)
    {
        $this->nomRegion = $nomRegion;
    }

    /**
     * Get nomRegion
     *
     * @return string 
     */
    public function getNomRegion()
    {
        return $this->nomRegion;
    }
}