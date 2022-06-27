<?php

namespace App\Entity;

use App\Repository\ArgproRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArgproRepository::class)
 */
class Argpro
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
    private $argpro;

    /**
     * @ORM\ManyToOne(targetEntity=SequenceReflexive::class, inversedBy="argpros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reflexive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArgpro(): ?string
    {
        return $this->argpro;
    }

    public function setArgpro(string $argpro): self
    {
        $this->argpro = $argpro;

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
