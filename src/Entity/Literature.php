<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LiteratureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LiteratureRepository::class)]
#[ApiResource]
class Literature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $literature_name;

    #[ORM\ManyToMany(targetEntity: CategoryLiterature::class, mappedBy: 'literature')]
    private $categoryLiteratures;

    #[ORM\ManyToMany(targetEntity: Program::class, mappedBy: 'literature')]
    private $programs;

    public function __construct()
    {
        $this->categoryLiteratures = new ArrayCollection();
        $this->programs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLiteratureName(): ?string
    {
        return $this->literature_name;
    }

    public function setLiteratureName(string $literature_name): self
    {
        $this->literature_name = $literature_name;

        return $this;
    }

    /**
     * @return Collection<int, CategoryLiterature>
     */
    public function getCategoryLiteratures(): Collection
    {
        return $this->categoryLiteratures;
    }

    public function addCategoryLiterature(CategoryLiterature $categoryLiterature): self
    {
        if (!$this->categoryLiteratures->contains($categoryLiterature)) {
            $this->categoryLiteratures[] = $categoryLiterature;
            $categoryLiterature->addLiterature($this);
        }

        return $this;
    }

    public function removeCategoryLiterature(CategoryLiterature $categoryLiterature): self
    {
        if ($this->categoryLiteratures->removeElement($categoryLiterature)) {
            $categoryLiterature->removeLiterature($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Program>
     */
    public function getPrograms(): Collection
    {
        return $this->programs;
    }

    public function addProgram(Program $program): self
    {
        if (!$this->programs->contains($program)) {
            $this->programs[] = $program;
            $program->addLiterature($this);
        }

        return $this;
    }

    public function removeProgram(Program $program): self
    {
        if ($this->programs->removeElement($program)) {
            $program->removeLiterature($this);
        }

        return $this;
    }
}
