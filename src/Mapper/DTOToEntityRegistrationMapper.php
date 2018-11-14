<?php

namespace App\Mapper;

use App\Entity\Address;
use App\Entity\Parents;
use App\Entity\Registration;
use App\Entity\SchoolBoy;
use App\Form\DTO\CreateRegistrationDTO;
use App\Uploader\FileUploader;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DTOToEntityRegistrationMapper
{
    /**
     * @var FileUploader
     */
    private $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    /**
     * @param CreateRegistrationDTO $registrationDTO
     *
     * @return Registration
     */
    public function map(CreateRegistrationDTO $registrationDTO)
    {
        $address = new Address(
            $registrationDTO->father->address->address1,
            $registrationDTO->father->address->address2,
            $registrationDTO->father->address->postalCode,
            $registrationDTO->father->address->city,
            $registrationDTO->father->address->country
        );

        $mother = new Parents(
            $registrationDTO->mother->lastName,
            $registrationDTO->mother->firstName,
            $registrationDTO->father->phone,
            $registrationDTO->father->email,
            $address
        );

        $father = new Parents(
            $registrationDTO->father->lastName,
            $registrationDTO->father->firstName,
            $registrationDTO->father->phone,
            $registrationDTO->father->email,
            $address
        );

        $schoolBoys = new ArrayCollection();
        foreach ($registrationDTO->schoolBoys as $schoolBoy) {

            $fileName  = null;
            if ($schoolBoy->photo instanceof UploadedFile) {
                $fileName = $this->fileUploader->upload($schoolBoy->photo);
            }

            $schoolBoys->add(
                new SchoolBoy(
                    $schoolBoy->firstName,
                    $schoolBoy->lastName,
                    $schoolBoy->birthDate,
                    $schoolBoy->birthplace,
                    $schoolBoy->classes,
                    $fileName
                ));
        }

        return new Registration($schoolBoys, $registrationDTO->matters, $father, $mother);
    }
}
