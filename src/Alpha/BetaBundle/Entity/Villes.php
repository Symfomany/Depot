<?php

namespace Alpha\BetaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alpha\BetaBundle\Entity\Villes
 *
 * @ORM\Table(name="villes")
 * @ORM\Entity(repositoryClass="Alpha\BetaBundle\Repository\VillesRepository")
 */
class Villes
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $habitants
     *
     * @ORM\Column(name="habitants", type="integer", nullable=false)
     */
    private $habitants;

    /**
     * @var integer $densite
     *
     * @ORM\Column(name="densite", type="integer", nullable=false)
     */
    private $densite;

    /**
     * @var string $departement
     *
     * @ORM\Column(name="departement", type="string", length=2, nullable=false)
     */
    private $departement;

    /**
     * @var string $nomVille
     *
     * @ORM\Column(name="nom_ville", type="string", length=255, nullable=false)
     */
    private $nomVille;

    /**
     * @var string $nomVilleMaj
     *
     * @ORM\Column(name="nom_ville_maj", type="string", length=255, nullable=false)
     */
    private $nomVilleMaj;

    /**
     * @var string $nomVilleUrl
     *
     * @ORM\Column(name="nom_ville_url", type="string", length=255, nullable=false)
     */
    private $nomVilleUrl;

    /**
     * @var string $codePostal
     *
     * @ORM\Column(name="code_postal", type="string", length=5, nullable=false)
     */
    private $codePostal;

    /**
     * @var integer $codeInsee
     *
     * @ORM\Column(name="code_insee", type="integer", nullable=false)
     */
    private $codeInsee;

    /**
     * @var float $latitude
     *
     * @ORM\Column(name="latitude", type="float", nullable=false)
     */
    private $latitude;

    /**
     * @var float $longitude
     *
     * @ORM\Column(name="longitude", type="float", nullable=false)
     */
    private $longitude;

    /**
     * @var boolean $coordFixed
     *
     * @ORM\Column(name="coord_fixed", type="boolean", nullable=false)
     */
    private $coordFixed;

    /**
     * @var string $cpArr
     *
     * @ORM\Column(name="cp_arr", type="string", length=5, nullable=false)
     */
    private $cpArr;

    /**
     * @var boolean $arrondissement
     *
     * @ORM\Column(name="arrondissement", type="boolean", nullable=false)
     */
    private $arrondissement;

    /**
     * @var float $latrad
     *
     * @ORM\Column(name="latRad", type="float", nullable=false)
     */
    private $latrad;

    /**
     * @var float $lonrad
     *
     * @ORM\Column(name="lonRad", type="float", nullable=false)
     */
    private $lonrad;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set habitants
     *
     * @param integer $habitants
     */
    public function setHabitants($habitants)
    {
        $this->habitants = $habitants;
    }

    /**
     * Get habitants
     *
     * @return integer 
     */
    public function getHabitants()
    {
        return $this->habitants;
    }

    /**
     * Set densite
     *
     * @param integer $densite
     */
    public function setDensite($densite)
    {
        $this->densite = $densite;
    }

    /**
     * Get densite
     *
     * @return integer 
     */
    public function getDensite()
    {
        return $this->densite;
    }

    /**
     * Set departement
     *
     * @param string $departement
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }

    /**
     * Get departement
     *
     * @return string 
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set nomVille
     *
     * @param string $nomVille
     */
    public function setNomVille($nomVille)
    {
        $this->nomVille = $nomVille;
    }

    /**
     * Get nomVille
     *
     * @return string 
     */
    public function getNomVille()
    {
        return $this->nomVille;
    }

    /**
     * Set nomVilleMaj
     *
     * @param string $nomVilleMaj
     */
    public function setNomVilleMaj($nomVilleMaj)
    {
        $this->nomVilleMaj = $nomVilleMaj;
    }

    /**
     * Get nomVilleMaj
     *
     * @return string 
     */
    public function getNomVilleMaj()
    {
        return $this->nomVilleMaj;
    }

    /**
     * Set nomVilleUrl
     *
     * @param string $nomVilleUrl
     */
    public function setNomVilleUrl($nomVilleUrl)
    {
        $this->nomVilleUrl = $nomVilleUrl;
    }

    /**
     * Get nomVilleUrl
     *
     * @return string 
     */
    public function getNomVilleUrl()
    {
        return $this->nomVilleUrl;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    /**
     * Get codePostal
     *
     * @return string 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set codeInsee
     *
     * @param integer $codeInsee
     */
    public function setCodeInsee($codeInsee)
    {
        $this->codeInsee = $codeInsee;
    }

    /**
     * Get codeInsee
     *
     * @return integer 
     */
    public function getCodeInsee()
    {
        return $this->codeInsee;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set coordFixed
     *
     * @param boolean $coordFixed
     */
    public function setCoordFixed($coordFixed)
    {
        $this->coordFixed = $coordFixed;
    }

    /**
     * Get coordFixed
     *
     * @return boolean 
     */
    public function getCoordFixed()
    {
        return $this->coordFixed;
    }

    /**
     * Set cpArr
     *
     * @param string $cpArr
     */
    public function setCpArr($cpArr)
    {
        $this->cpArr = $cpArr;
    }

    /**
     * Get cpArr
     *
     * @return string 
     */
    public function getCpArr()
    {
        return $this->cpArr;
    }

    /**
     * Set arrondissement
     *
     * @param boolean $arrondissement
     */
    public function setArrondissement($arrondissement)
    {
        $this->arrondissement = $arrondissement;
    }

    /**
     * Get arrondissement
     *
     * @return boolean 
     */
    public function getArrondissement()
    {
        return $this->arrondissement;
    }

    /**
     * Set latrad
     *
     * @param float $latrad
     */
    public function setLatrad($latrad)
    {
        $this->latrad = $latrad;
    }

    /**
     * Get latrad
     *
     * @return float 
     */
    public function getLatrad()
    {
        return $this->latrad;
    }

    /**
     * Set lonrad
     *
     * @param float $lonrad
     */
    public function setLonrad($lonrad)
    {
        $this->lonrad = $lonrad;
    }

    /**
     * Get lonrad
     *
     * @return float 
     */
    public function getLonrad()
    {
        return $this->lonrad;
    }
}