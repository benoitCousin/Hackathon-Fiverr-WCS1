<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $creatorQlvl;

    /**
     * @ORM\Column(type="integer")
     */
    private $correctorQlvl;

    /**
     * @ORM\Column(type="integer")
     */
    private $correctorExlvl;

    /**
     * @ORM\Column(type="integer")
     */
    private $realisatorExlvl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCreatorQlvl(): ?int
    {
        return $this->creatorQlvl;
    }

    public function setCreatorQlvl(int $creatorQlvl): self
    {
        $this->creatorQlvl = $creatorQlvl;

        return $this;
    }

    public function getCorrectorQlvl(): ?int
    {
        return $this->correctorQlvl;
    }

    public function setCorrectorQlvl(int $correctorQlvl): self
    {
        $this->correctorQlvl = $correctorQlvl;

        return $this;
    }

    public function getCorrectorExlvl(): ?int
    {
        return $this->correctorExlvl;
    }

    public function setCorrectorExlvl(int $correctorExlvl): self
    {
        $this->correctorExlvl = $correctorExlvl;

        return $this;
    }

    public function getRealisatorExlvl(): ?int
    {
        return $this->realisatorExlvl;
    }

    public function setRealisatorExlvl(int $realisatorExlvl): self
    {
        $this->realisatorExlvl = $realisatorExlvl;

        return $this;
    }
}
