<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $username;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\ManyToMany(targetEntity: Program::class, inversedBy: 'users')]
    private $program;

    #[ORM\ManyToMany(targetEntity: TrainingCenters::class, inversedBy: 'users')]
    private $training_centers;

    #[ORM\ManyToMany(targetEntity: Disciplines::class, inversedBy: 'users')]
    private $disciplines;

    #[ORM\ManyToMany(targetEntity: Module::class, inversedBy: 'users')]
    private $module;

    public function __construct()
    {
        $this->training_centers = new ArrayCollection();
        $this->program = new ArrayCollection();
        $this->disciplines = new ArrayCollection();
        $this->module = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
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

    /**
     * @param array $roles
     * @return $this
     */
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

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Program>
     */
    public function getProgram(): Collection
    {
        return $this->program;
    }

    /**
     * @param Program $program
     * @return $this
     */
    public function addProgram(Program $program): self
    {
        if (!$this->program->contains($program)) {
            $this->program[] = $program;
        }

        return $this;
    }

    /**
     * @param Program $program
     * @return $this
     */
    public function removeProgram(Program $program): self
    {
        $this->program->removeElement($program);

        return $this;
    }

    /**
     * @return Collection<int, TrainingCenters>
     */
    public function getTrainingCenters(): Collection
    {
        return $this->training_centers;
    }

    /**
     * @param TrainingCenters $trainingCenter
     * @return $this
     */
    public function addTrainingCenter(TrainingCenters $trainingCenter): self
    {
        if (!$this->training_centers->contains($trainingCenter)) {
            $this->training_centers[] = $trainingCenter;
        }

        return $this;
    }

    /**
     * @param TrainingCenters $trainingCenter
     * @return $this
     */
    public function removeTrainingCenter(TrainingCenters $trainingCenter): self
    {
        $this->training_centers->removeElement($trainingCenter);

        return $this;
    }

    /**
     * @return Collection<int, Disciplines>
     */
    public function getDisciplines(): Collection
    {
        return $this->disciplines;
    }

    /**
     * @param Disciplines $discipline
     * @return $this
     */
    public function addDiscipline(Disciplines $discipline): self
    {
        if (!$this->disciplines->contains($discipline)) {
            $this->disciplines[] = $discipline;
        }

        return $this;
    }

    /**
     * @param Disciplines $discipline
     * @return $this
     */
    public function removeDiscipline(Disciplines $discipline): self
    {
        $this->disciplines->removeElement($discipline);

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModule(): Collection
    {
        return $this->module;
    }

    /**
     * @param Module $module
     * @return $this
     */
    public function addModule(Module $module): self
    {
        if (!$this->module->contains($module)) {
            $this->module[] = $module;
        }

        return $this;
    }

    /**
     * @param Module $module
     * @return $this
     */
    public function removeModule(Module $module): self
    {
        $this->module->removeElement($module);

        return $this;
    }
}
