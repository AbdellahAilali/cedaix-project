<?php

namespace App\Form\DTO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class CreateRegistrationDTO
{
    /**
     * @var Collection
     *
     * @Assert\Valid
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\SchoolBoy", cascade={"persist"})
     */
    public $schoolBoys;

    /**
     * @Assert\Valid()
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    public $father;

    /**
     * @Assert\Valid()
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    public $mother;

    /**
     * @ORM\Column(type="date")
     * @ORM\JoinColumn(nullable=false)
     */
    public $createdAt;

    /**
     * @Assert\Count(min=1, minMessage="Veuillez choisir au moins une matière")
     * @ORM\ManyToMany(targetEntity="App\Entity\Matter")
     */
    public $matters;

    public function __construct()
    {
        $this->schoolBoys = new ArrayCollection();
        $this->matters = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function addSchoolBoy(CreateSchoolBoyDTO $schoolBoy): self
    {
        if (!$this->schoolBoys->contains($schoolBoy)) {
            $this->schoolBoys[] = $schoolBoy;
        }

        return $this;
    }
}
