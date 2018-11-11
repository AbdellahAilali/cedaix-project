<?php

namespace App\Form\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class CreateMotherDTO
{
    /**
     * @Assert\NotBlank()
     */
    public $lastName;

    /**
     * @Assert\NotBlank()
     */
    public $firstName;

    /**
     * @Assert\NotBlank()
     */
    public $phone;
}
