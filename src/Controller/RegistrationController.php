<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Matter;
use App\Entity\Parents;
use App\Entity\Registration;
use App\Entity\SchoolBoy;
use App\Form\DTO\CreateRegistrationDTO;
use App\Form\DTO\CreateSchoolBoyDTO;
use App\Form\MotherType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegistrationType;

class RegistrationController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * RegistrationController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/registration", name="registration")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $matters = $this->getDoctrine()->getManager()->getRepository(Matter::class)->findAll();

        $registration = new CreateRegistrationDTO();
        $registration->addSchoolBoy(new CreateSchoolBoyDTO());

        $request->setLocale('fr');
        $form = $this->createForm(RegistrationType::class, $registration);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var CreateRegistrationDTO $registrationDTO */
            $registrationDTO = $form->getData();

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
                $schoolBoys->add(
                    new SchoolBoy(
                        $schoolBoy->firstName,
                        $schoolBoy->lastName,
                        $schoolBoy->birthDate,
                        $schoolBoy->birthplace,
                        $schoolBoy->classes
                    ));
            }

            $registration = new Registration($schoolBoys, $registrationDTO->matters, $father, $mother);

            $this->entityManager->persist($registration);

            $this->entityManager->flush();

            return $this->redirectToRoute('registration');
        } else {
            dump($form->getErrors(true));
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
            'matters' => $matters,
        ]);
    }
}
