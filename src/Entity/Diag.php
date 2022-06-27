<?php

namespace App\Entity;

use App\Repository\DiagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiagRepository::class)
 */
class Diag
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
    private $diag;

    /**
     * @ORM\ManyToOne(targetEntity=SequenceReflexive::class, inversedBy="diags")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reflexive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiag(): ?string
    {
        return $this->diag;
    }

    public function setDiag(string $diag): self
    {
        $this->diag = $diag;

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
