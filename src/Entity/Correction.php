<?php

namespace App\Entity;

use App\Repository\CorrectionRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="datetime_immutable")
     */
    private $correctedAt;

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

    public function getCorrectedAt(): ?\DateTimeImmutable
    {
        return $this->correctedAt;
    }

    public function setCorrectedAt(\DateTimeImmutable $correctedAt): self
    {
        $this->correctedAt = $correctedAt;

        return $this;
    }
}
