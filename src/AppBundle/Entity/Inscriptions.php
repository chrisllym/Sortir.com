<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscriptions
 *
 * @ORM\Table(name="inscriptions")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InscriptionsRepository")
 */
class Inscriptions
{

    /**
     * @var \AppBundle\Entity\Sorties
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sorties")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sorties_no_sortie", referencedColumnName="no_sortie")
     * })
     */
    private $sortiesNoSortie;

    /**
     * @var \AppBundle\Entity\Participants
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Participants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="participants_no_participant", referencedColumnName="no_participant")
     * })
     */
    private $participantsNoParticipant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscription", type="date")
     */
    private $dateInscription;


    /**
     * Set dateInscription.
     *
     * @param \DateTime $dateInscription
     *
     * @return Inscriptions
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription.
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set sortiesNoSortie.
     *
     * @param \AppBundle\Entity\Sorties $sortiesNoSortie
     *
     * @return Inscriptions
     */
    public function setSortiesNoSortie(\AppBundle\Entity\Sorties $sortiesNoSortie)
    {
        $this->sortiesNoSortie = $sortiesNoSortie;

        return $this;
    }

    /**
     * Get sortiesNoSortie.
     *
     * @return \AppBundle\Entity\Sorties
     */
    public function getSortiesNoSortie()
    {
        return $this->sortiesNoSortie;
    }

    /**
     * Set participantsNoParticipant.
     *
     * @param \AppBundle\Entity\Participants $participantsNoParticipant
     *
     * @return Inscriptions
     */
    public function setParticipantsNoParticipant(\AppBundle\Entity\Participants $participantsNoParticipant)
    {
        $this->participantsNoParticipant = $participantsNoParticipant;

        return $this;
    }

    /**
     * Get participantsNoParticipant.
     *
     * @return \AppBundle\Entity\Participants
     */
    public function getParticipantsNoParticipant()
    {
        return $this->participantsNoParticipant;
    }
}
