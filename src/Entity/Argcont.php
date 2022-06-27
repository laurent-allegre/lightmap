<?php

namespace App\Entity;

use App\Repository\ArgcontRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArgcontRepository::class)
 */
class Argcont
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
    private $argcont;

    /**
     * @ORM\ManyToOne(targetEntity=SequenceReflexive::class, inversedBy="argconts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reflexive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArgcont(): ?string
    {
        return $this->argcont;
    }

    public function setArgcont(string $argcont): self
    {
        $this->argcont = $argcont;

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
