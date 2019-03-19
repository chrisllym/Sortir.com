<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etats
 *
 * @ORM\Table(name="etats")
 * @ORM\Entity
 */
class Etats
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=30, nullable=false)
     */
    private $libelle;

    /**
     * @var integer
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Sorties", mappedBy="etatsNoEtat", cascade={"persist"})
     * @ORM\Column(name="no_etat", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $noEtat;



    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Etats
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Get noEtat
     *
     * @return integer
     */
    public function getNoEtat()
    {
        return $this->noEtat;
    }
}
