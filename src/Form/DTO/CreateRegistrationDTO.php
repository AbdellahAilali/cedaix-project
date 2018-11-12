<?php

namespace App\Form\DTO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class CreateRegistrationDTO
{
    /**
     * @var CreateSchoolBoyDTO[]
     *
     * @Assert\Valid
     */
    public $schoolBoys;

    /**
     * @Assert\Valid()
     *
     * @var CreateParentsDTO
     */
    public $father;

    /**
     * @Assert\Valid()
     *
     * @var CreateMotherDTO
     */
    public $mother;

    /**
     * @ORM\Column(type="date")
     * @ORM\JoinColumn(nullable=false)
     */
    public $createdAt;

    /**
     * @Assert\Count(min=1, minMessage="Veuillez choisir au moins une matière")
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
