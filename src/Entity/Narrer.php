<?php

namespace App\Entity;

use App\Repository\NarrerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NarrerRepository::class)
 */
class Narrer
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
    private $narrer;

    /**
     * @ORM\ManyToOne(targetEntity=SequenceReflexive::class, inversedBy="narrers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reflexive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNarrer(): ?string
    {
        return $this->narrer;
    }

    public function setNarrer(string $narrer): self
    {
        $this->narrer = $narrer;

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
