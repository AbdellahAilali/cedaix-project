<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClassesRepository")
 */
class   Classes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=28)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SchoolBoy", mappedBy="classes")
     */
    private $schoolBoys;

    public function __construct()
    {
        $this->schoolBoys = new ArrayCollection();
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
     * @return Collection|SchoolBoy[]
     */
    public function getSchoolBoys(): Collection
    {
        return $this->schoolBoys;
    }

    public function addSchoolBoy(SchoolBoy $schoolBoy): self
    {
        if (!$this->schoolBoys->contains($schoolBoy)) {
            $this->schoolBoys[] = $schoolBoy;
            $schoolBoy->setClasses($this);
        }

        return $this;
    }

    public function removeSchoolBoy(SchoolBoy $schoolBoy): self
    {
        if ($this->schoolBoys->contains($schoolBoy)) {
            $this->schoolBoys->removeElement($schoolBoy);
            // set the owning side to null (unless already changed)
            if ($schoolBoy->getClasses() === $this) {
                $schoolBoy->setClasses(null);
            }
        }

        return $this;
    }
}
