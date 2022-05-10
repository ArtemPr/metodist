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

    #[ORM\Column(type: 'integer')]
    private $old_id;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $active = false;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $phone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $url;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $external_upload_bakalavrmagistr_id;

    #[ORM\Column(type: 'integer', length: 3, nullable: true)]
    private $external_upload_sdo_id;

    #[ORM\Column(type: 'integer', length: 3, nullable: true)]
    private $site_id;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'training_centers')]
    private $users;

    #[ORM\ManyToMany(targetEntity: TrainingCentersRequisites::class, inversedBy: 'trainingCenters', cascade: ['persist'])]
    #[ORM\OrderBy(['dateAded'=>'DESC'])]
    private $requisites;


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
     * @return mixed
     */
    public function getOldId()
    {
        return $this->old_id;
    }

    /**
     * @param mixed $old_id
     */
    public function setOldId($old_id): void
    {
        $this->old_id = $old_id;
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

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getExternalUploadBakalavrmagistrId()
    {
        return $this->external_upload_bakalavrmagistr_id;
    }

    /**
     * @param mixed $external_upload_bakalavrmagistr_id
     */
    public function setExternalUploadBakalavrmagistrId($external_upload_bakalavrmagistr_id): void
    {
        $this->external_upload_bakalavrmagistr_id = $external_upload_bakalavrmagistr_id;
    }

    /**
     * @return mixed
     */
    public function getExternalUploadSdoId()
    {
        return $this->external_upload_sdo_id;
    }

    /**
     * @param mixed $external_upload_sdo_id
     */
    public function setExternalUploadSdoId($external_upload_sdo_id): void
    {
        $this->external_upload_sdo_id = $external_upload_sdo_id;
    }

    /**
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * @param mixed $site_id
     */
    public function setSiteId($site_id): void
    {
        $this->site_id = $site_id;
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
