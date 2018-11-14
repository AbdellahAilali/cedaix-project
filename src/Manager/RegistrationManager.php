<?php

namespace App\Manager;


use App\Entity\Registration;
use Doctrine\ORM\EntityManagerInterface;

class RegistrationManager
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Registration $registration)
    {
        $this->entityManager->persist($registration);
        $this->entityManager->flush();
    }
}
