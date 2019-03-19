<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Villes
 *
 * @ORM\Table(name="villes")
 * @ORM\Entity
 */
class Villes
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_ville", type="string", length=30, nullable=false)
     */
    private $nomVille;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=10, nullable=false)
     */
    private $codePostal;

    /**
     * @var integer
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Lieux", mappedBy="villesNoVille", cascade={"persist"})
     * @ORM\Column(name="no_ville", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $noVille;



    /**
     * Set nomVille
     *
     * @param string $nomVille
     *
     * @return Villes
     */
    public function setNomVille($nomVille)
    {
        $this->nomVille = $nomVille;

        return $this;
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
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Villes
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
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
     * Get noVille
     *
     * @return integer
     */
    public function getNoVille()
    {
        return $this->noVille;
    }
}
