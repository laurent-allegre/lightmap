<?php

namespace App\Entity;

use App\Repository\PreRequisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PreRequisRepository::class)
 */
class PreRequis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libellerRequis;

    /**
     * @ORM\ManyToOne(targetEntity=SpositionInitial::class, inversedBy="preRequis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PositionInitial;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellerRequis(): ?string
    {
        return $this->libellerRequis;
    }

    public function setLibellerRequis(?string $libellerRequis): self
    {
        $this->libellerRequis = $libellerRequis;

        return $this;
    }

    public function getPositionInitial(): ?SpositionInitial
    {
        return $this->PositionInitial;
    }

    public function setPositionInitial(?SpositionInitial $PositionInitial): self
    {
        $this->PositionInitial = $PositionInitial;

        return $this;
    }
}
