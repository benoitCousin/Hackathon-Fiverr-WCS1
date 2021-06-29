<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    private $furkan;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;
    
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

    /**
     * @ORM\OneToMany(targetEntity=Challenge::class, mappedBy="creator")
     */
    private $challenges;

    /**
     * @ORM\OneToMany(targetEntity=Exercice::class, mappedBy="realisator")
     */
    private $exercices;

    /**
     * @ORM\OneToMany(targetEntity=Correction::class, mappedBy="corrector")
     */
    private $corrections;

    
    public function __construct()
    {
        $this->challenges = new ArrayCollection();
        $this->exercices = new ArrayCollection();
        $this->corrections = new ArrayCollection();
    }

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

    /**
     * @return Collection|Challenge[]
     */
    public function getChallenges(): Collection
    {
        return $this->challenges;
    }

    public function addChallenge(Challenge $challenge): self
    {
        if (!$this->challenges->contains($challenge)) {
            $this->challenges[] = $challenge;
            $challenge->setCreator($this);
        }

        return $this;
    }

    public function removeChallenge(Challenge $challenge): self
    {
        if ($this->challenges->removeElement($challenge)) {
            // set the owning side to null (unless already changed)
            if ($challenge->getCreator() === $this) {
                $challenge->setCreator(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Exercice[]
     */
    public function getExercices(): Collection
    {
        return $this->exercices;
    }

    public function addExercice(Exercice $exercice): self
    {
        if (!$this->exercices->contains($exercice)) {
            $this->exercices[] = $exercice;
            $exercice->setRealisator($this);
        }

        return $this;
    }

    public function removeExercice(Exercice $exercice): self
    {
        if ($this->exercices->removeElement($exercice)) {
            // set the owning side to null (unless already changed)
            if ($exercice->getRealisator() === $this) {
                $exercice->setRealisator(null);
            }
        }

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
            $correction->setCorrector($this);
        }

        return $this;
    }

    public function removeCorrection(Correction $correction): self
    {
        if ($this->corrections->removeElement($correction)) {
            // set the owning side to null (unless already changed)
            if ($correction->getCorrector() === $this) {
                $correction->setCorrector(null);
            }
        }

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}