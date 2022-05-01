<?php

namespace App\Entity;

use App\Repository\TrainingCentersRequisitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingCentersRequisitesRepository::class)]
class TrainingCentersRequisites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: TrainingCenters::class, mappedBy: 'requisites')]
    private $trainingCenters;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $short_name;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    private $address_your;

    #[ORM\Column(type: 'string', length: 255)]
    private $address_fact;

    #[ORM\Column(type: 'string', length: 255)]
    private $director;

    #[ORM\Column(type: 'string', length: 255)]
    private $about_director;

    #[ORM\Column(type: 'date')]
    private $dateAded;

    public function __construct()
    {
        $this->trainingCenters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $trainingCenter->addRequisite($this);
        }

        return $this;
    }

    public function removeTrainingCenter(TrainingCenters $trainingCenter): self
    {
        if ($this->trainingCenters->removeElement($trainingCenter)) {
            $trainingCenter->removeRequisite($this);
        }

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

    public function getShortName(): ?string
    {
        return $this->short_name;
    }

    public function setShortName(string $short_name): self
    {
        $this->short_name = $short_name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddressYour(): ?string
    {
        return $this->address_your;
    }

    public function setAddressYour(string $address_your): self
    {
        $this->address_your = $address_your;

        return $this;
    }

    public function getAddressFact(): ?string
    {
        return $this->address_fact;
    }

    public function setAddressFact(string $address_fact): self
    {
        $this->address_fact = $address_fact;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getAboutDirector(): ?string
    {
        return $this->about_director;
    }

    public function setAboutDirector(string $about_director): self
    {
        $this->about_director = $about_director;

        return $this;
    }

    public function getDateAded(): ?\DateTimeInterface
    {
        return $this->dateAded;
    }

    public function setDateAded(\DateTimeInterface $dateAded): self
    {
        $this->dateAded = $dateAded;

        return $this;
    }

    public function __toString()
    {
        $date = $this->dateAded;
        $date = $date->format('d.m.Y');
        return '(' . $date . ') - ' . $this->short_name;
    }
}
