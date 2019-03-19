<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lieux
 *
 * @ORM\Table(name="lieux", indexes={@ORM\Index(name="lieux_villes_fk", columns={"villes_no_ville"})})
 * @ORM\Entity
 */
class Lieux
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_lieu", type="string", length=30, nullable=false)
     */
    private $nomLieu;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=30, nullable=true)
     */
    private $rue;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var integer
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Sorties", mappedBy="lieuxNoLieu", cascade={"persist"})
     * @ORM\Column(name="no_lieu", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $noLieu;

    /**
     * @var \AppBundle\Entity\Villes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Villes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="villes_no_ville", referencedColumnName="no_ville")
     * })
     */
    private $villesNoVille;



    /**
     * Set nomLieu
     *
     * @param string $nomLieu
     *
     * @return Lieux
     */
    public function setNomLieu($nomLieu)
    {
        $this->nomLieu = $nomLieu;

        return $this;
    }

    /**
     * Get nomLieu
     *
     * @return string
     */
    public function getNomLieu()
    {
        return $this->nomLieu;
    }

    /**
     * Set rue
     *
     * @param string $rue
     *
     * @return Lieux
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Lieux
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
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
     *
     * @return Lieux
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
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
     * Get noLieu
     *
     * @return integer
     */
    public function getNoLieu()
    {
        return $this->noLieu;
    }

    /**
     * Set villesNoVille
     *
     * @param \AppBundle\Entity\Villes $villesNoVille
     *
     * @return Lieux
     */
    public function setVillesNoVille(\AppBundle\Entity\Villes $villesNoVille = null)
    {
        $this->villesNoVille = $villesNoVille;

        return $this;
    }

    /**
     * Get villesNoVille
     *
     * @return \AppBundle\Entity\Villes
     */
    public function getVillesNoVille()
    {
        return $this->villesNoVille;
    }
}
