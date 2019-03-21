<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Participants
 *
 * @ORM\Table(name="participants", uniqueConstraints={@ORM\UniqueConstraint(name="PARTICIPANTS_participants_pseudo_uk", columns={"pseudo"})}, indexes={@ORM\Index(name="sites_participants_fk", columns={"sites_no_site"})})
 * @ORM\Entity
 */
class Participants implements UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=30, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=15, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=20, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe", type="string", length=20, nullable=false)
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="administrateur", type="boolean", nullable=false)
     */
    private $administrateur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif;

    /**
     * @var integer
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Sorties", mappedBy="organisateur", cascade={"persist"})
     * @ORM\Column(name="no_participant", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $noParticipant;

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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Sorties", mappedBy="participantsNoParticipant")
     */
    private $sortiesNoSortie;

    /**
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     *
     * @Assert\Image()
     */
    private $photo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sortiesNoSortie = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set username
     *
     * @param string $username
     *
     * @return Participants
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Participants
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Participants
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Participants
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Participants
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Participants
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get motDePasse
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set administrateur
     *
     * @param boolean $administrateur
     *
     * @return Participants
     */
    public function setAdministrateur($administrateur)
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    /**
     * Get administrateur
     *
     * @return boolean
     */
    public function getAdministrateur()
    {
        return $this->administrateur;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     *
     * @return Participants
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Get noParticipant
     *
     * @return integer
     */
    public function getNoParticipant()
    {
        return $this->noParticipant;
    }

    /**
     * Set sitesNoSite
     *
     * @param \AppBundle\Entity\Sites $sitesNoSite
     *
     * @return Participants
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
     * Add sortiesNoSortie
     *
     * @param \AppBundle\Entity\Sorties $sortiesNoSortie
     *
     * @return Participants
     */
    public function addSortiesNoSortie(\AppBundle\Entity\Sorties $sortiesNoSortie)
    {
        $this->sortiesNoSortie[] = $sortiesNoSortie;

        return $this;
    }

    /**
     * Remove sortiesNoSortie
     *
     * @param \AppBundle\Entity\Sorties $sortiesNoSortie
     */
    public function removeSortiesNoSortie(\AppBundle\Entity\Sorties $sortiesNoSortie)
    {
        $this->sortiesNoSortie->removeElement($sortiesNoSortie);
    }

    /**
     * Get sortiesNoSortie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSortiesNoSortie()
    {
        return $this->sortiesNoSortie;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return Participants
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }


}
