<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
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
     * @ORM\ManyToMany(targetEntity="App\Entity\SchoolBoy", cascade={"persist"})
     */
    private $schoolBoys;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $father;

    /**
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Matter")
     */
    private $matters;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Payment", mappedBy="registration", orphanRemoval=true)
     */
    private $payments;

    public function __construct(ArrayCollection $schoolBoys, ArrayCollection $matters, Parents $father, Parents $mother)
    {
        $this->schoolBoys = $schoolBoys;
        $this->matters = $matters;
        $this->father = $father;
        $this->mother = $mother;
        $this->createdAt = new \DateTime();
        $this->payments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
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
     * @return Parents|null
     */
    public function getMother(): ?Parents
    {
        return $this->mother;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments[] = $payment;
            $payment->setRegistration($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): self
    {
        if ($this->payments->contains($payment)) {
            $this->payments->removeElement($payment);
            // set the owning side to null (unless already changed)
            if ($payment->getRegistration() === $this) {
                $payment->setRegistration(null);
            }
        }

        return $this;
    }
}
