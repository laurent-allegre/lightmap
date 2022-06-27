<?php

namespace App\Entity;

use App\Repository\TachesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TachesRepository::class)
 */
class Taches
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
    private $tache;

    /**
     * @ORM\ManyToOne(targetEntity=MiseEnsituation::class, inversedBy="taches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $situation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTache(): ?string
    {
        return $this->tache;
    }

    public function setTache(string $tache): self
    {
        $this->tache = $tache;

        return $this;
    }

    public function getSituation(): ?MiseEnsituation
    {
        return $this->situation;
    }

    public function setSituation(?MiseEnsituation $situation): self
    {
        $this->situation = $situation;

        return $this;
    }
}
