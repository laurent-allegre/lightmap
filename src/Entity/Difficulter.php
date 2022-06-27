<?php

namespace App\Entity;

use App\Repository\DifficulterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DifficulterRepository::class)
 */
class Difficulter
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
    private $difficulter;

    /**
     * @ORM\ManyToOne(targetEntity=SequenceReflexive::class, inversedBy="difficulters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reflexive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDifficulter(): ?string
    {
        return $this->difficulter;
    }

    public function setDifficulter(string $difficulter): self
    {
        $this->difficulter = $difficulter;

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
