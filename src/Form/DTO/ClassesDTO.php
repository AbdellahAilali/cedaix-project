<?php

namespace App\Form\DTO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\UuidInterface;

class ClassesDTO
{
    /**
     * @ORM\Column(type="string", length=28)
     * @Assert\NotBlank()
     */
    public $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SchoolBoy", mappedBy="classes")
     */
    public $schoolBoys;

    public function __construct()
    {
        $this->schoolBoys = new ArrayCollection();
    }
}
