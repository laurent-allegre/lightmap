<?php

namespace App\Entity;

use App\Repository\ScomplementaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ScomplementaireRepository::class)
 */
class Scomplementaire
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
     * @ORM\Column(type="text")
     */
    private $preconisations;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureDebut;

    /**
     * @Assert\GreaterThanOrEqual(propertyPath="dateDebut")
     * @ORM\Column(type="date")
     *
     */
    private $dateFin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureFin;

    /**
     * @ORM\ManyToOne(targetEntity=Parcours::class, inversedBy="scomplementaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parcour;

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

    public function getPreconisations(): ?string
    {
        return $this->preconisations;
    }

    public function setPreconisations(string $preconisations): self
    {
        $this->preconisations = $preconisations;

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

    public function  __toString(){
        return $this->parcours;
    }
}
