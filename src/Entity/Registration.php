<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\RegistrationRepository")
 */
class Registration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SchoolBoy", inversedBy="registrations", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $schoolBoy;

    /**
     * @ORM\Column(type="date")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Matter", inversedBy="registrations")
     */
    private $matter;

    public function __construct()
    {
        $this->matter = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSchoolBoy(): ?SchoolBoy
    {
        return $this->schoolBoy;
    }

    public function setSchoolBoy(?SchoolBoy $schoolBoy): self
    {
        $this->schoolBoy = $schoolBoy;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Matter[]
     */
    public function getMatter(): Collection
    {
        return $this->matter;
    }

    public function addMatter(Matter $matter): self
    {
        if (!$this->matter->contains($matter)) {
            $this->matter[] = $matter;
        }

        return $this;
    }

    public function removeMatter(Matter $matter): self
    {
        if ($this->matter->contains($matter)) {
            $this->matter->removeElement($matter);
        }

        return $this;
    }
}
