<?php

namespace App\Entity;

use App\Repository\CategoryLiteratureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryLiteratureRepository::class)]
class CategoryLiterature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: Literature::class, inversedBy: 'categoryLiteratures')]
    private $literature;

    public function __construct()
    {
        $this->literature = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Literature>
     */
    public function getLiterature(): Collection
    {
        return $this->literature;
    }

    public function addLiterature(Literature $literature): self
    {
        if (!$this->literature->contains($literature)) {
            $this->literature[] = $literature;
        }

        return $this;
    }

    public function removeLiterature(Literature $literature): self
    {
        $this->literature->removeElement($literature);

        return $this;
    }
}
