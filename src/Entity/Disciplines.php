<?php

namespace App\Entity;

use App\Repository\DisciplinesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplinesRepository::class)]
class Disciplines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $disciplines_name;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'disciplines')]
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDisciplinesName(): ?string
    {
        return $this->disciplines_name;
    }

    /**
     * @return $this
     */
    public function setDisciplinesName(string $disciplines_name): self
    {
        $this->disciplines_name = $disciplines_name;

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
     * @return $this
     */
    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addDiscipline($this);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeDiscipline($this);
        }

        return $this;
    }
}
