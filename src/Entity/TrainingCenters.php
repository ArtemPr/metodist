<?php

namespace App\Entity;

use App\Repository\TrainingCentersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingCentersRepository::class)]
class TrainingCenters
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'training_centers')]
    private $users;

    #[ORM\ManyToMany(targetEntity: TrainingCentersRequisites::class, inversedBy: 'trainingCenters', cascade: ['persist'])]
    private $requisites;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active = false;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->requisites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    /**
     * @return $this
     */
    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addTrainingCenter($this);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeTrainingCenter($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, TrainingCentersRequisites>
     */
    public function getRequisites(): Collection
    {
        return $this->requisites;
    }

    public function addRequisite(TrainingCentersRequisites $requisite): self
    {
        if (!$this->requisites->contains($requisite)) {
            $this->requisites[] = $requisite;
        }

        return $this;
    }

    public function removeRequisite(TrainingCentersRequisites $requisite): self
    {
        $this->requisites->removeElement($requisite);

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
