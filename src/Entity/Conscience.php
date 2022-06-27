<?php

namespace App\Entity;

use App\Repository\ConscienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConscienceRepository::class)
 */
class Conscience
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
    private $conscience;

    /**
     * @ORM\ManyToOne(targetEntity=SequenceReflexive::class, inversedBy="consciences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reflexive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConscience(): ?string
    {
        return $this->conscience;
    }

    public function setConscience(string $conscience): self
    {
        $this->conscience = $conscience;

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
