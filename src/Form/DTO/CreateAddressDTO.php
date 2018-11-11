<?php

namespace App\Form\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class CreateAddressDTO
{
    /**
     * @Assert\NotBlank()
     *
     * @var string
     */
    public $address1;

    /**
     * @var string
     */
    public $address2;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="numeric", message="Ce champ doit contenir des chiffres.")
     * @Assert\Length(min="5", max="5", exactMessage="Ce champs doit contenir exactement 5 chiffres")
     *
     * @var integer
     */
    public $postalCode;

    /**
     * @Assert\NotBlank()
     *
     * @var string
     */
    public $city;

    /**
     * @Assert\NotBlank()
     *
     * @var string
     */
    public $country;

    public function __construct()
    {
        $this->country = 'France';
    }
}
