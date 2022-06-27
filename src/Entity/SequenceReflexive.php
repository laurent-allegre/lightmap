<?php

namespace App\Entity;

use App\Repository\SequenceReflexiveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SequenceReflexiveRepository::class)
 */
class SequenceReflexive
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
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureFin;

    /**
     * @ORM\ManyToOne(targetEntity=Parcours::class, inversedBy="sequenceReflexives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parcour;

    /**
     * @ORM\OneToMany(targetEntity=Narrer::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $narrers;

    /**
     * @ORM\OneToMany(targetEntity=Questionner::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $questionners;

    /**
     * @ORM\OneToMany(targetEntity=Conscience::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $consciences;

    /**
     * @ORM\OneToMany(targetEntity=Difficulter::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $difficulters;

    /**
     * @ORM\OneToMany(targetEntity=Preference::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $preferences;

    /**
     * @ORM\OneToMany(targetEntity=Argcont::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $argconts;

    /**
     * @ORM\OneToMany(targetEntity=Argpro::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $argpros;

    /**
     * @ORM\OneToMany(targetEntity=Objectif::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $objectifs;

    /**
     * @ORM\OneToMany(targetEntity=Pratique::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $pratiques;

    /**
     * @ORM\OneToMany(targetEntity=Diag::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $diags;

    /**
     * @ORM\OneToMany(targetEntity=Proposer::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $proposers;

    /**
     * @ORM\OneToMany(targetEntity=Explorer::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $explorers;

    /**
     * @ORM\OneToMany(targetEntity=Formuler::class, mappedBy="reflexive", orphanRemoval=true, cascade={"persist"})
     */
    private $formulers;

    public function __construct()
    {
        $this->narrers = new ArrayCollection();
        $this->questionners = new ArrayCollection();
        $this->consciences = new ArrayCollection();
        $this->difficulters = new ArrayCollection();
        $this->preferences = new ArrayCollection();
        $this->argconts = new ArrayCollection();
        $this->argpros = new ArrayCollection();
        $this->objectifs = new ArrayCollection();
        $this->pratiques = new ArrayCollection();
        $this->diags = new ArrayCollection();
        $this->proposers = new ArrayCollection();
        $this->explorers = new ArrayCollection();
        $this->formulers = new ArrayCollection();
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
     * @return Collection<int, Narrer>
     */
    public function getNarrers(): Collection
    {
        return $this->narrers;
    }

    public function addNarrer(Narrer $narrer): self
    {
        if (!$this->narrers->contains($narrer)) {
            $this->narrers[] = $narrer;
            $narrer->setReflexive($this);
        }

        return $this;
    }

    public function removeNarrer(Narrer $narrer): self
    {
        if ($this->narrers->removeElement($narrer)) {
            // set the owning side to null (unless already changed)
            if ($narrer->getReflexive() === $this) {
                $narrer->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Questionner>
     */
    public function getQuestionners(): Collection
    {
        return $this->questionners;
    }

    public function addQuestionner(Questionner $questionner): self
    {
        if (!$this->questionners->contains($questionner)) {
            $this->questionners[] = $questionner;
            $questionner->setReflexive($this);
        }

        return $this;
    }

    public function removeQuestionner(Questionner $questionner): self
    {
        if ($this->questionners->removeElement($questionner)) {
            // set the owning side to null (unless already changed)
            if ($questionner->getReflexive() === $this) {
                $questionner->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Conscience>
     */
    public function getConsciences(): Collection
    {
        return $this->consciences;
    }

    public function addConscience(Conscience $conscience): self
    {
        if (!$this->consciences->contains($conscience)) {
            $this->consciences[] = $conscience;
            $conscience->setReflexive($this);
        }

        return $this;
    }

    public function removeConscience(Conscience $conscience): self
    {
        if ($this->consciences->removeElement($conscience)) {
            // set the owning side to null (unless already changed)
            if ($conscience->getReflexive() === $this) {
                $conscience->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Difficulter>
     */
    public function getDifficulters(): Collection
    {
        return $this->difficulters;
    }

    public function addDifficulter(Difficulter $difficulter): self
    {
        if (!$this->difficulters->contains($difficulter)) {
            $this->difficulters[] = $difficulter;
            $difficulter->setReflexive($this);
        }

        return $this;
    }

    public function removeDifficulter(Difficulter $difficulter): self
    {
        if ($this->difficulters->removeElement($difficulter)) {
            // set the owning side to null (unless already changed)
            if ($difficulter->getReflexive() === $this) {
                $difficulter->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Preference>
     */
    public function getPreferences(): Collection
    {
        return $this->preferences;
    }

    public function addPreference(Preference $preference): self
    {
        if (!$this->preferences->contains($preference)) {
            $this->preferences[] = $preference;
            $preference->setReflexive($this);
        }

        return $this;
    }

    public function removePreference(Preference $preference): self
    {
        if ($this->preferences->removeElement($preference)) {
            // set the owning side to null (unless already changed)
            if ($preference->getReflexive() === $this) {
                $preference->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Argcont>
     */
    public function getArgconts(): Collection
    {
        return $this->argconts;
    }

    public function addArgcont(Argcont $argcont): self
    {
        if (!$this->argconts->contains($argcont)) {
            $this->argconts[] = $argcont;
            $argcont->setReflexive($this);
        }

        return $this;
    }

    public function removeArgcont(Argcont $argcont): self
    {
        if ($this->argconts->removeElement($argcont)) {
            // set the owning side to null (unless already changed)
            if ($argcont->getReflexive() === $this) {
                $argcont->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Argpro>
     */
    public function getArgpros(): Collection
    {
        return $this->argpros;
    }

    public function addArgpro(Argpro $argpro): self
    {
        if (!$this->argpros->contains($argpro)) {
            $this->argpros[] = $argpro;
            $argpro->setReflexive($this);
        }

        return $this;
    }

    public function removeArgpro(Argpro $argpro): self
    {
        if ($this->argpros->removeElement($argpro)) {
            // set the owning side to null (unless already changed)
            if ($argpro->getReflexive() === $this) {
                $argpro->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Objectif>
     */
    public function getObjectifs(): Collection
    {
        return $this->objectifs;
    }

    public function addObjectif(Objectif $objectif): self
    {
        if (!$this->objectifs->contains($objectif)) {
            $this->objectifs[] = $objectif;
            $objectif->setReflexive($this);
        }

        return $this;
    }

    public function removeObjectif(Objectif $objectif): self
    {
        if ($this->objectifs->removeElement($objectif)) {
            // set the owning side to null (unless already changed)
            if ($objectif->getReflexive() === $this) {
                $objectif->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Pratique>
     */
    public function getPratiques(): Collection
    {
        return $this->pratiques;
    }

    public function addPratique(Pratique $pratique): self
    {
        if (!$this->pratiques->contains($pratique)) {
            $this->pratiques[] = $pratique;
            $pratique->setReflexive($this);
        }

        return $this;
    }

    public function removePratique(Pratique $pratique): self
    {
        if ($this->pratiques->removeElement($pratique)) {
            // set the owning side to null (unless already changed)
            if ($pratique->getReflexive() === $this) {
                $pratique->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Diag>
     */
    public function getDiags(): Collection
    {
        return $this->diags;
    }

    public function addDiag(Diag $diag): self
    {
        if (!$this->diags->contains($diag)) {
            $this->diags[] = $diag;
            $diag->setReflexive($this);
        }

        return $this;
    }

    public function removeDiag(Diag $diag): self
    {
        if ($this->diags->removeElement($diag)) {
            // set the owning side to null (unless already changed)
            if ($diag->getReflexive() === $this) {
                $diag->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Proposer>
     */
    public function getProposers(): Collection
    {
        return $this->proposers;
    }

    public function addProposer(Proposer $proposer): self
    {
        if (!$this->proposers->contains($proposer)) {
            $this->proposers[] = $proposer;
            $proposer->setReflexive($this);
        }

        return $this;
    }

    public function removeProposer(Proposer $proposer): self
    {
        if ($this->proposers->removeElement($proposer)) {
            // set the owning side to null (unless already changed)
            if ($proposer->getReflexive() === $this) {
                $proposer->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Explorer>
     */
    public function getExplorers(): Collection
    {
        return $this->explorers;
    }

    public function addExplorer(Explorer $explorer): self
    {
        if (!$this->explorers->contains($explorer)) {
            $this->explorers[] = $explorer;
            $explorer->setReflexive($this);
        }

        return $this;
    }

    public function removeExplorer(Explorer $explorer): self
    {
        if ($this->explorers->removeElement($explorer)) {
            // set the owning side to null (unless already changed)
            if ($explorer->getReflexive() === $this) {
                $explorer->setReflexive(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Formuler>
     */
    public function getFormulers(): Collection
    {
        return $this->formulers;
    }

    public function addFormuler(Formuler $formuler): self
    {
        if (!$this->formulers->contains($formuler)) {
            $this->formulers[] = $formuler;
            $formuler->setReflexive($this);
        }

        return $this;
    }

    public function removeFormuler(Formuler $formuler): self
    {
        if ($this->formulers->removeElement($formuler)) {
            // set the owning side to null (unless already changed)
            if ($formuler->getReflexive() === $this) {
                $formuler->setReflexive(null);
            }
        }

        return $this;
    }
}
