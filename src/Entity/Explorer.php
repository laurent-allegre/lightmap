<?php

namespace App\Entity;

use App\Repository\ExplorerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExplorerRepository::class)
 */
class Explorer
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
    private $explorer;

    /**
     * @ORM\ManyToOne(targetEntity=SequenceReflexive::class, inversedBy="explorers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reflexive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExplorer(): ?string
    {
        return $this->explorer;
    }

    public function setExplorer(string $explorer): self
    {
        $this->explorer = $explorer;

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
