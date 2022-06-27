<?php

namespace App\Entity;

use App\Repository\ObjectifCompetenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjectifCompetenceRepository::class)
 */
class ObjectifCompetence
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
    private $libellerObjectif;

    /**
     * @ORM\ManyToOne(targetEntity=SpositionInitial::class, inversedBy="objectifCompetences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $objectifInitial;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellerObjectif(): ?string
    {
        return $this->libellerObjectif;
    }

    public function setLibellerObjectif(string $libellerObjectif): self
    {
        $this->libellerObjectif = $libellerObjectif;

        return $this;
    }

    public function getObjectifInitial(): ?SpositionInitial
    {
        return $this->objectifInitial;
    }

    public function setObjectifInitial(?SpositionInitial $objectifInitial): self
    {
        $this->objectifInitial = $objectifInitial;

        return $this;
    }
}
