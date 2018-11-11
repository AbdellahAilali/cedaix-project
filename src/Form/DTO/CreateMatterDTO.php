<?php

namespace App\Form\DTO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\UuidInterface;

class CreateMatterDTO
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=28)
     * @Assert\NotBlank()
     */
    public $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    public $description;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank()
     */
    public $price;
}
