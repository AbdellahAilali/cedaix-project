<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\UuidInterface;

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
     * @var Collection
     *
     * @Assert\Valid
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\SchoolBoy", cascade={"persist"})
     */
    private $schoolBoys;

    /**
     * @Assert\Valid()
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $father;

    /**
     * @Assert\Valid()
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $mother;

    /**
     * @ORM\Column(type="date")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdAt;

    /**
     * @Assert\Count(min=1)
     * @ORM\ManyToMany(targetEntity="App\Entity\Matter")
     */
    private $matters;

    public function __construct()
    {
        $this->schoolBoys = new ArrayCollection();
        $this->matters = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|SchoolBoy[]
     */
    public function getSchoolBoys(): ?   Collection
    {
        return $this->schoolBoys;
    }

    public function addSchoolBoy(SchoolBoy $schoolBoy): self
    {
        if (!$this->schoolBoys->contains($schoolBoy)) {
            $this->schoolBoys[] = $schoolBoy;
        }

        return $this;
    }

    public function removeSchoolBoy(SchoolBoy $schoolBoy): self
    {
        if ($this->schoolBoys->contains($schoolBoy)) {
            $this->schoolBoys->removeElement($schoolBoy);
        }

        return $this;
    }
    
    /**
     * @return Collection|Matter[]
     */
    public function getMatters(): Collection
    {
        return $this->matters;
    }

    public function addMatter(Matter $matter): self
    {
        if (!$this->matters->contains($matter)) {
            $this->matters[] = $matter;
        }

        return $this;
    }

    public function removeMatter(Matter $matter): self
    {
        if ($this->matters->contains($matter)) {
            $this->matters->removeElement($matter);
        }

        return $this;
    }

    /**
     * @return Parents|null
     */
    public function getFather(): ?Parents
    {
        return $this->father;
    }

    /**
     * @param Parents $father
     *
     * @return Registration
     */
    public function setFather(Parents $father): self
    {
        $this->father = $father;

        return $this;
    }

    /**
     * @return Parents|null
     */
    public function getMother(): ?Parents
    {
        return $this->mother;
    }

    /**
     * @param Parents $mother
     *
     * @return Registration
     */
    public function setMother(Parents $mother): self
    {
        $this->mother = $mother;

        return $this;
    }
}
