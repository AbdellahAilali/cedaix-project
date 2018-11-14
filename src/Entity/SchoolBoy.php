<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

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
    private $lastName;

    /**
     * @ORM\Column(type="string", length=28)
     */
    private $firstName;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=28)
     */
    private $birthplace;

    /**
     * @var null|string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $photo;

    /**
     * @var null|string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $insurance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classes", inversedBy="schoolBoys")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classes;

    public function __construct(
        string $lastName,
        string $firstName,
        \DateTime $birthDate,
        string $birthplace,
        Classes $classes,
        string $photo = null,
        string $insurance = null
    ) {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->birthDate = $birthDate;
        $this->birthplace = $birthplace;
        $this->classes = $classes;
        $this->photo = $photo;
        $this->insurance = $insurance;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getBirthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getClasses(): Classes
    {
        return $this->classes;
    }

    public function getBirthplace(): string
    {
        return $this->birthplace;
    }

    /**
     * @return null|string
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhotoFileName(string $fileName)
    {
        $this->photo = $fileName;
    }

    public function setInsuranceFileName(string $fileName)
    {
        $this->insurance = $fileName;
    }
}
