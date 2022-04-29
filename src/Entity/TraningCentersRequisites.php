<?php

namespace App\Entity;

use App\Repository\TraningCentersRequisitesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TraningCentersRequisitesRepository::class)]
class TraningCentersRequisites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
