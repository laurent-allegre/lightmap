<?php

namespace App\Entity;

use App\Repository\ResultatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultatsRepository::class)
 */
class Resultats
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
    private $resultat;

    /**
     * @ORM\ManyToOne(targetEntity=MiseEnSituation::class, inversedBy="resultats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $situation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResultat(): ?string
    {
        return $this->resultat;
    }

    public function setResultat(string $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }

    public function getSituation(): ?MiseEnSituation
    {
        return $this->situation;
    }

    public function setSituation(?MiseEnSituation $situation): self
    {
        $this->situation = $situation;

        return $this;
    }
}
