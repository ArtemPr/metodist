<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string')]
    private $name;

    #[ORM\OneToMany(mappedBy: 'document', targetEntity: TrainingCenters::class)]
    private $trainingCenters;

    public function __construct()
    {
        $this->trainingCenters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection<int, TrainingCenters>
     */
    public function getTrainingCenters(): Collection
    {
        return $this->trainingCenters;
    }

    public function addTrainingCenter(TrainingCenters $trainingCenter): self
    {
        if (!$this->trainingCenters->contains($trainingCenter)) {
            $this->trainingCenters[] = $trainingCenter;
            $trainingCenter->setDocument($this);
        }

        return $this;
    }

    public function removeTrainingCenter(TrainingCenters $trainingCenter): self
    {
        if ($this->trainingCenters->removeElement($trainingCenter)) {
            // set the owning side to null (unless already changed)
            if ($trainingCenter->getDocument() === $this) {
                $trainingCenter->setDocument(null);
            }
        }

        return $this;
    }
}
