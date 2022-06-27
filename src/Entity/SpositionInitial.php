<?php

namespace App\Entity;

use App\Repository\SpositionInitialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SpositionInitialRepository::class)
 */
class SpositionInitial
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Veuillez saisir un nom à la séquence")
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="text")
     */
    private $contexte;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="datetime")
     */
    private $heureDebut;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="datetime")
     */
    private $heureFin;

    /**
     * @ORM\ManyToOne(targetEntity=Parcours::class, inversedBy="spositionInitials")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parcour;

    /**
     * @ORM\OneToMany(targetEntity=PreRequis::class, mappedBy="PositionInitial", orphanRemoval=true, cascade={"persist"})
     */
    private $preRequis;

    /**
     * @ORM\OneToMany(targetEntity=ObjectifCompetence::class, mappedBy="objectifInitial", orphanRemoval=true, cascade={"persist"})
     */
    private $objectifCompetences;

    public function __construct()
    {
        $this->preRequis = new ArrayCollection();
        $this->objectifCompetences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getContexte(): ?string
    {
        return $this->contexte;
    }

    public function setContexte(string $contexte): self
    {
        $this->contexte = $contexte;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getParcour(): ?Parcours
    {
        return $this->parcour;
    }

    public function setParcour(?Parcours $parcour): self
    {
        $this->parcour = $parcour;

        return $this;
    }

    /**
     * @return Collection<int, PreRequis>
     */
    public function getPreRequis(): Collection
    {
        return $this->preRequis;
    }

    public function addPreRequi(PreRequis $preRequi): self
    {
        if (!$this->preRequis->contains($preRequi)) {
            $this->preRequis[] = $preRequi;
            $preRequi->setPositionInitial($this);
        }

        return $this;
    }

    public function removePreRequi(PreRequis $preRequi): self
    {
        if ($this->preRequis->removeElement($preRequi)) {
            // set the owning side to null (unless already changed)
            if ($preRequi->getPositionInitial() === $this) {
                $preRequi->setPositionInitial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ObjectifCompetence>
     */
    public function getObjectifCompetences(): Collection
    {
        return $this->objectifCompetences;
    }

    public function addObjectifCompetence(ObjectifCompetence $objectifCompetence): self
    {
        if (!$this->objectifCompetences->contains($objectifCompetence)) {
            $this->objectifCompetences[] = $objectifCompetence;
            $objectifCompetence->setObjectifInitial($this);
        }

        return $this;
    }

    public function removeObjectifCompetence(ObjectifCompetence $objectifCompetence): self
    {
        if ($this->objectifCompetences->removeElement($objectifCompetence)) {
            // set the owning side to null (unless already changed)
            if ($objectifCompetence->getObjectifInitial() === $this) {
                $objectifCompetence->setObjectifInitial(null);
            }
        }

        return $this;
    }
}
