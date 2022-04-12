<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProgramRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProgramRepository::class)]
#[ApiResource]
class Program
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $program_name;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'program')]
    private $users;

    #[ORM\ManyToMany(targetEntity: AcademicPlan::class, inversedBy: 'programs')]
    private $academic_plan;


    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->academic_plan = new ArrayCollection();
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
    public function getProgramName(): ?string
    {
        return $this->program_name;
    }

    /**
     * @param string $program_name
     * @return $this
     */
    public function setProgramName(string $program_name): self
    {
        $this->program_name = $program_name;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addProgram($this);
        }

        return $this;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeProgram($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, AcademicPlan>
     */
    public function getAcademicPlan(): Collection
    {
        return $this->academic_plan;
    }

    public function addAcademicPlan(AcademicPlan $academicPlan): self
    {
        if (!$this->academic_plan->contains($academicPlan)) {
            $this->academic_plan[] = $academicPlan;
        }

        return $this;
    }

    public function removeAcademicPlan(AcademicPlan $academicPlan): self
    {
        $this->academic_plan->removeElement($academicPlan);

        return $this;
    }
}
