<?php

namespace App\Form\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class CreateSchoolBoyDTO
{
    /**
     *
     * @Assert\NotBlank()
     */
    public $lastName;

    /**
     *
     * @Assert\NotBlank()
     */
    public $firstName;

    /**
     * @Assert\NotBlank()
     */
    public $birthDate;

    /**
     *
     * @Assert\NotBlank()
     */
    public $birthplace;

    /**
     */
    public $classes;
}
