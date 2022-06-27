<?php

namespace App\Entity;

use App\Repository\ParcoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParcoursRepository::class)
 */
class Parcours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomParcours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string", length=18)
     */
    private $numeroSiret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomApprenant;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $prenomApprenant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $posteOccupe;

    /**
     * @ORM\ManyToOne(targetEntity=Formateurs::class, inversedBy="parcours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formateur;

    /**
     * @ORM\OneToMany(targetEntity=Scomplementaire::class, mappedBy="parcour", orphanRemoval=true)
     */
    private $scomplementaires;

    /**
     * @ORM\OneToMany(targetEntity=SpositionInitial::class, mappedBy="parcour", orphanRemoval=true)
     */
    private $spositionInitials;

    /**
     * @ORM\OneToMany(targetEntity=MiseEnSituation::class, mappedBy="parcour", orphanRemoval=true)
     */
    private $miseEnSituations;

    /**
     * @ORM\OneToMany(targetEntity=SequenceReflexive::class, mappedBy="parcour", orphanRemoval=true)
     */
    private $sequenceReflexives;

    public function  __toString(){
        return $this->nomParcours;
    }

    public function __construct()
    {
        $this->scomplementaires = new ArrayCollection();
        $this->spositionInitials = new ArrayCollection();
        $this->miseEnSituations = new ArrayCollection();
        $this->sequenceReflexives = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomParcours(): ?string
    {
        return $this->nomParcours;
    }

    public function setNomParcours(string $nomParcours): self
    {
        $this->nomParcours = $nomParcours;

        return $this;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getNumeroSiret(): ?int
    {
        return $this->numeroSiret;
    }

    public function setNumeroSiret(int $numeroSiret): self
    {
        $this->numeroSiret = $numeroSiret;

        return $this;
    }

    public function getNomApprenant(): ?string
    {
        return $this->nomApprenant;
    }

    public function setNomApprenant(string $nomApprenant): self
    {
        $this->nomApprenant = $nomApprenant;

        return $this;
    }

    public function getPrenomApprenant(): ?string
    {
        return $this->prenomApprenant;
    }

    public function setPrenomApprenant(string $prenomApprenant): self
    {
        $this->prenomApprenant = $prenomApprenant;

        return $this;
    }

    public function getPosteOccupe(): ?string
    {
        return $this->posteOccupe;
    }

    public function setPosteOccupe(string $posteOccupe): self
    {
        $this->posteOccupe = $posteOccupe;

        return $this;
    }

    public function getFormateur(): ?Formateurs
    {
        return $this->formateur;
    }

    public function setFormateur(?Formateurs $formateur): self
    {
        $this->formateur = $formateur;

        return $this;
    }

    /**
     * @return Collection<int, Scomplementaire>
     */
    public function getScomplementaires(): Collection
    {
        return $this->scomplementaires;
    }

    public function addScomplementaire(Scomplementaire $scomplementaire): self
    {
        if (!$this->scomplementaires->contains($scomplementaire)) {
            $this->scomplementaires[] = $scomplementaire;
            $scomplementaire->setParcour($this);
        }

        return $this;
    }

    public function removeScomplementaire(Scomplementaire $scomplementaire): self
    {
        if ($this->scomplementaires->removeElement($scomplementaire)) {
            // set the owning side to null (unless already changed)
            if ($scomplementaire->getParcour() === $this) {
                $scomplementaire->setParcour(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SpositionInitial>
     */
    public function getSpositionInitials(): Collection
    {
        return $this->spositionInitials;
    }

    public function addSpositionInitial(SpositionInitial $spositionInitial): self
    {
        if (!$this->spositionInitials->contains($spositionInitial)) {
            $this->spositionInitials[] = $spositionInitial;
            $spositionInitial->setParcour($this);
        }

        return $this;
    }

    public function removeSpositionInitial(SpositionInitial $spositionInitial): self
    {
        if ($this->spositionInitials->removeElement($spositionInitial)) {
            // set the owning side to null (unless already changed)
            if ($spositionInitial->getParcour() === $this) {
                $spositionInitial->setParcour(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MiseEnSituation>
     */
    public function getMiseEnSituations(): Collection
    {
        return $this->miseEnSituations;
    }

    public function addMiseEnSituation(MiseEnSituation $miseEnSituation): self
    {
        if (!$this->miseEnSituations->contains($miseEnSituation)) {
            $this->miseEnSituations[] = $miseEnSituation;
            $miseEnSituation->setParcour($this);
        }

        return $this;
    }

    public function removeMiseEnSituation(MiseEnSituation $miseEnSituation): self
    {
        if ($this->miseEnSituations->removeElement($miseEnSituation)) {
            // set the owning side to null (unless already changed)
            if ($miseEnSituation->getParcour() === $this) {
                $miseEnSituation->setParcour(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SequenceReflexive>
     */
    public function getSequenceReflexives(): Collection
    {
        return $this->sequenceReflexives;
    }

    public function addSequenceReflexife(SequenceReflexive $sequenceReflexife): self
    {
        if (!$this->sequenceReflexives->contains($sequenceReflexife)) {
            $this->sequenceReflexives[] = $sequenceReflexife;
            $sequenceReflexife->setParcour($this);
        }

        return $this;
    }

    public function removeSequenceReflexife(SequenceReflexive $sequenceReflexife): self
    {
        if ($this->sequenceReflexives->removeElement($sequenceReflexife)) {
            // set the owning side to null (unless already changed)
            if ($sequenceReflexife->getParcour() === $this) {
                $sequenceReflexife->setParcour(null);
            }
        }

        return $this;
    }



}
