<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=ExerciceRepository::class)
 */
class Exercice
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $doneAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="exercices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $realisator;

    /**
     * @ORM\ManyToOne(targetEntity=Challenge::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $challenge;

    /**
     * @ORM\OneToMany(targetEntity=Correction::class, mappedBy="exercice")
     */
    private $corrections;

    public function __construct()
    {
        $this->corrections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDoneAt(): ?DateTime
    {
        return $this->doneAt;
    }

    public function setDoneAt(DateTime $doneAt): self
    {
        $this->doneAt = $doneAt;

        return $this;
    }

    public function getRealisator(): ?User
    {
        return $this->realisator;
    }

    public function setRealisator(?User $realisator): self
    {
        $this->realisator = $realisator;

        return $this;
    }

    public function getChallenge(): ?Challenge
    {
        return $this->challenge;
    }

    public function setChallenge(?Challenge $challenge): self
    {
        $this->challenge = $challenge;

        return $this;
    }

    /**
     * @return Collection|Correction[]
     */
    public function getCorrections(): Collection
    {
        return $this->corrections;
    }

    public function addCorrection(Correction $correction): self
    {
        if (!$this->corrections->contains($correction)) {
            $this->corrections[] = $correction;
            $correction->setExercice($this);
        }

        return $this;
    }

    public function removeCorrection(Correction $correction): self
    {
        if ($this->corrections->removeElement($correction)) {
            // set the owning side to null (unless already changed)
            if ($correction->getExercice() === $this) {
                $correction->setExercice(null);
            }
        }

        return $this;
    }
}
