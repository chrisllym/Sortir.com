<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sorties
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SortiesRepository")
 * @ORM\Table(name="sorties", indexes={@ORM\Index(name="sorties_etats_fk", columns={"etats_no_etat"}), @ORM\Index(name="sorties_lieux_fk", columns={"lieux_no_lieu"}), @ORM\Index(name="sorties_participants_fk", columns={"organisateur"}), @ORM\Index(name="sorties_sites_fk", columns={"sites_no_site"})})
 * @ORM\Entity
 */
class Sorties
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetime", nullable=false)
     */
    private $datedebut;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer", nullable=true)
     */
    private $duree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecloture", type="datetime", nullable=false)
     */
    private $datecloture;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbinscriptionsmax", type="integer", nullable=false)
     */
    private $nbinscriptionsmax;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptioninfos", type="text", length=65535, nullable=true)
     */
    private $descriptioninfos;

    /**
     * @var integer
     *
     * @ORM\Column(name="etatsortie", type="integer", nullable=true)
     */
    private $etatsortie;

    /**
     * @var string
     *
     * @ORM\Column(name="urlPhoto", type="string", length=250, nullable=true)
     */
    private $urlphoto;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_sortie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $noSortie;

    /**
     * @var \AppBundle\Entity\Etats
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Etats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etats_no_etat", referencedColumnName="no_etat")
     * })
     */
    private $etatsNoEtat;

    /**
     * @var \AppBundle\Entity\Lieux
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lieux")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lieux_no_lieu", referencedColumnName="no_lieu")
     * })
     */
    private $lieuxNoLieu;

    /**
     * @var \AppBundle\Entity\Participants
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Participants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisateur", referencedColumnName="no_participant")
     * })
     */
    private $organisateur;

    /**
     * @var \AppBundle\Entity\Sites
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sites")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sites_no_site", referencedColumnName="no_site")
     * })
     */
    private $sitesNoSite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Participants", inversedBy="sortiesNoSortie")
     * @ORM\JoinTable(name="inscriptions",
     *   joinColumns={
     *     @ORM\JoinColumn(name="sorties_no_sortie", referencedColumnName="no_sortie")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="participants_no_participant", referencedColumnName="no_participant")
     *   }
     * )
     */
    private $participantsNoParticipant;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participantsNoParticipant = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Sorties
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
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
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Sorties
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Sorties
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set datecloture
     *
     * @param \DateTime $datecloture
     *
     * @return Sorties
     */
    public function setDatecloture($datecloture)
    {
        $this->datecloture = $datecloture;

        return $this;
    }

    /**
     * Get datecloture
     *
     * @return \DateTime
     */
    public function getDatecloture()
    {
        return $this->datecloture;
    }

    /**
     * Set nbinscriptionsmax
     *
     * @param integer $nbinscriptionsmax
     *
     * @return Sorties
     */
    public function setNbinscriptionsmax($nbinscriptionsmax)
    {
        $this->nbinscriptionsmax = $nbinscriptionsmax;

        return $this;
    }

    /**
     * Get nbinscriptionsmax
     *
     * @return integer
     */
    public function getNbinscriptionsmax()
    {
        return $this->nbinscriptionsmax;
    }

    /**
     * Set descriptioninfos
     *
     * @param string $descriptioninfos
     *
     * @return Sorties
     */
    public function setDescriptioninfos($descriptioninfos)
    {
        $this->descriptioninfos = $descriptioninfos;

        return $this;
    }

    /**
     * Get descriptioninfos
     *
     * @return string
     */
    public function getDescriptioninfos()
    {
        return $this->descriptioninfos;
    }

    /**
     * Set etatsortie
     *
     * @param integer $etatsortie
     *
     * @return Sorties
     */
    public function setEtatsortie($etatsortie)
    {
        $this->etatsortie = $etatsortie;

        return $this;
    }

    /**
     * Get etatsortie
     *
     * @return integer
     */
    public function getEtatsortie()
    {
        return $this->etatsortie;
    }

    /**
     * Set urlphoto
     *
     * @param string $urlphoto
     *
     * @return Sorties
     */
    public function setUrlphoto($urlphoto)
    {
        $this->urlphoto = $urlphoto;

        return $this;
    }

    /**
     * Get urlphoto
     *
     * @return string
     */
    public function getUrlphoto()
    {
        return $this->urlphoto;
    }

    /**
     * Get noSortie
     *
     * @return integer
     */
    public function getNoSortie()
    {
        return $this->noSortie;
    }

    /**
     * Set etatsNoEtat
     *
     * @param \AppBundle\Entity\Etats $etatsNoEtat
     *
     * @return Sorties
     */
    public function setEtatsNoEtat(\AppBundle\Entity\Etats $etatsNoEtat = null)
    {
        $this->etatsNoEtat = $etatsNoEtat;

        return $this;
    }

    /**
     * Get etatsNoEtat
     *
     * @return \AppBundle\Entity\Etats
     */
    public function getEtatsNoEtat()
    {
        return $this->etatsNoEtat;
    }

    /**
     * Set lieuxNoLieu
     *
     * @param \AppBundle\Entity\Lieux $lieuxNoLieu
     *
     * @return Sorties
     */
    public function setLieuxNoLieu(\AppBundle\Entity\Lieux $lieuxNoLieu = null)
    {
        $this->lieuxNoLieu = $lieuxNoLieu;

        return $this;
    }

    /**
     * Get lieuxNoLieu
     *
     * @return \AppBundle\Entity\Lieux
     */
    public function getLieuxNoLieu()
    {
        return $this->lieuxNoLieu;
    }

    /**
     * Set organisateur
     *
     * @param \AppBundle\Entity\Participants $organisateur
     *
     * @return Sorties
     */
    public function setOrganisateur(\AppBundle\Entity\Participants $organisateur = null)
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    /**
     * Get organisateur
     *
     * @return \AppBundle\Entity\Participants
     */
    public function getOrganisateur()
    {
        return $this->organisateur;
    }

    /**
     * Set sitesNoSite
     *
     * @param \AppBundle\Entity\Sites $sitesNoSite
     *
     * @return Sorties
     */
    public function setSitesNoSite(\AppBundle\Entity\Sites $sitesNoSite = null)
    {
        $this->sitesNoSite = $sitesNoSite;

        return $this;
    }

    /**
     * Get sitesNoSite
     *
     * @return \AppBundle\Entity\Sites
     */
    public function getSitesNoSite()
    {
        return $this->sitesNoSite;
    }

    /**
     * Add participantsNoParticipant
     *
     * @param \AppBundle\Entity\Participants $participantsNoParticipant
     *
     * @return Sorties
     */
    public function addParticipantsNoParticipant(\AppBundle\Entity\Participants $participantsNoParticipant)
    {
        $this->participantsNoParticipant[] = $participantsNoParticipant;

        return $this;
    }

    /**
     * Remove participantsNoParticipant
     *
     * @param \AppBundle\Entity\Participants $participantsNoParticipant
     */
    public function removeParticipantsNoParticipant(\AppBundle\Entity\Participants $participantsNoParticipant)
    {
        $this->participantsNoParticipant->removeElement($participantsNoParticipant);
    }

    /**
     * Get participantsNoParticipant
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipantsNoParticipant()
    {
        return $this->participantsNoParticipant;
    }
}
