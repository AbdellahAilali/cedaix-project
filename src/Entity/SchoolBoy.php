<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolBoyRepository")
 */
class SchoolBoy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=28)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=28)
     */
    private $firstname;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(type="string", length=28)
     */
    private $birthplace;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registration", mappedBy="schoolBoy")
     */
    private $registrations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classes", inversedBy="schoolBoys")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $father;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mother;

    public function __construct()
    {
        $this->registrations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * @return Collection|Registration[]
     */
    public function getRegistrations(): Collection
    {
        return $this->registrations;
    }

    public function addRegistration(Registration $registration): self
    {
        if (!$this->registrations->contains($registration)) {
            $this->registrations[] = $registration;
            $registration->setSchoolBoy($this);
        }

        return $this;
    }

    public function removeRegistration(Registration $registration): self
    {
        if ($this->registrations->contains($registration)) {
            $this->registrations->removeElement($registration);
            // set the owning side to null (unless already changed)
            if ($registration->getSchoolBoy() === $this) {
                $registration->setSchoolBoy(null);
            }
        }

        return $this;
    }

    public function getClasses(): ?Classes
    {
        return $this->classes;
    }

    public function setClasses(?Classes $classes): self
    {
        $this->classes = $classes;

        return $this;
    }

    public function getFather(): ?Parents
    {
        return $this->father;
    }

    public function setFather($father): self
    {
        $this->father = $father;

        return $this;
    }

    public function getMother(): ?Parents
    {
        return $this->mother;
    }

    public function setMother($mother): self
    {
        $this->mother = $mother;

        return $this;
    }

    public function getBirthplace(): ?string
    {
        return $this->birthplace;
    }

    public function setBirthplace(string $birthplace): self
    {
        $this->birthplace = $birthplace;

        return $this;
    }
}