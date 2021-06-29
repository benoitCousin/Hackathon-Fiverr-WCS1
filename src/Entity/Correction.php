<?php

namespace App\Entity;

use App\Repository\CorrectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=CorrectionRepository::class)
 */
class Correction
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
    private $correctedAt;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="correction")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="corrections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $corrector;

    /**
     * @ORM\ManyToOne(targetEntity=Exercice::class, inversedBy="corrections")
     */
    private $exercice;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
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

    public function getCorrectedAt(): ?DateTime
    {
        return $this->correctedAt;
    }

    public function setCorrectedAt(DateTime $correctedAt): self
    {
        $this->correctedAt = $correctedAt;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setCorrection($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getCorrection() === $this) {
                $comment->setCorrection(null);
            }
        }

        return $this;
    }

    public function getCorrector(): ?User
    {
        return $this->corrector;
    }

    public function setCorrector(?User $corrector): self
    {
        $this->corrector = $corrector;

        return $this;
    }

    public function getExercice(): ?Exercice
    {
        return $this->exercice;
    }

    public function setExercice(?Exercice $exercice): self
    {
        $this->exercice = $exercice;

        return $this;
    }
}
