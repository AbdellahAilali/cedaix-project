<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 */
class Address
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=56)
     * @Assert\NotBlank()
     */
    private $address1;

    /**
     * @ORM\Column(type="string", length=56, nullable=true)
     */
    private $address2;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Length(min="5", max="5")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=28)
     * @Assert\NotBlank()
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=28)
     */
    private $country;

    public function __construct()
    {
        $this->country = 'France';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress1(): string
    {
        return $this->address1;
    }

    public function setAddress1(string $address1): self
    {
        $this->address1 = $address1;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    public function getPostalCode(): int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
