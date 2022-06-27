<?php

namespace App\Entity;

use App\Repository\FormulerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormulerRepository::class)
 */
class Formuler
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
    private $formuler;

    /**
     * @ORM\ManyToOne(targetEntity=SequenceReflexive::class, inversedBy="formulers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reflexive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormuler(): ?string
    {
        return $this->formuler;
    }

    public function setFormuler(string $formuler): self
    {
        $this->formuler = $formuler;

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
