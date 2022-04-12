<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', nullable: false)]
    private string $user_name;

    #[ORM\Column(type: 'string', nullable: false)]
    private string $password;

    /** association */

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
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param string $user_name
     */
    public function setUserName(string $user_name): void
    {
        $this->user_name = $user_name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
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

    public function addDiscipline(Disciplines $discipline): self
    {
        if (!$this->disciplines->contains($discipline)) {
            $this->disciplines[] = $discipline;
        }

        return $this;
    }

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

    public function addModule(Module $module): self
    {
        if (!$this->module->contains($module)) {
            $this->module[] = $module;
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        $this->module->removeElement($module);

        return $this;
    }

}
