<?php

namespace App\Entity;

use App\Repository\PratiqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PratiqueRepository::class)
 */
class Pratique
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
    private $pratique;

    /**
     * @ORM\ManyToOne(targetEntity=SequenceReflexive::class, inversedBy="pratiques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reflexive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPratique(): ?string
    {
        return $this->pratique;
    }

    public function setPratique(string $pratique): self
    {
        $this->pratique = $pratique;

        return $this;
    }

    public function getReflexive(): ?SequenceReflexive
    {
        return $this->reflexive;
    }

    public function setReflexive(?SequenceReflexive $reflexive): self
    {
        $this->reflexive = $reflexive;

        return $this;
    }
}
