<?php

namespace App\Form\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class CreateParentsDTO
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

    /**
     * @Assert\NotBlank()
     */
    public $email;

    /**
     * @Assert\Valid()
     */
    public $address;
}
