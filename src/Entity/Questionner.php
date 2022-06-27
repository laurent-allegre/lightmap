<?php

namespace App\Entity;

use App\Repository\QuestionnerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionnerRepository::class)
 */
class Questionner
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
    private $questionner;

    /**
     * @ORM\ManyToOne(targetEntity=SequenceReflexive::class, inversedBy="questionners")
     */
    private $reflexive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionner(): ?string
    {
        return $this->questionner;
    }

    public function setQuestionner(string $questionner): self
    {
        $this->questionner = $questionner;

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
