<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sites
 *
 * @ORM\Table(name="sites", uniqueConstraints={@ORM\UniqueConstraint(name="SITES_sites_nom_uk", columns={"nom_site"})})
 * @ORM\Entity
 */
class Sites
{
    /**
     * @var string
     * @ORM\Column(name="nom_site", type="string", length=30, nullable=false)
     */
    private $nomSite;

    /**
     * @var integer
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Sorties", mappedBy="sites_no_site", cascade={"persist"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Participants", mappedBy="sites_no_site", cascade={"persist"})
     * @ORM\Column(name="no_site", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $noSite;



    /**
     * Set nomSite
     *
     * @param string $nomSite
     *
     * @return Sites
     */
    public function setNomSite($nomSite)
    {
        $this->nomSite = $nomSite;

        return $this;
    }

    /**
     * Get nomSite
     *
     * @return string
     */
    public function getNomSite()
    {
        return $this->nomSite;
    }

    /**
     * Get noSite
     *
     * @return integer
     */
    public function getNoSite()
    {
        return $this->noSite;
    }
}
