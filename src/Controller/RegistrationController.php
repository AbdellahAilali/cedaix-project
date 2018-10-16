<?php

namespace App\Controller;

use App\Entity\Registration;
use App\Entity\SchoolBoy;
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
        $form = $this->createForm(RegistrationType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var Registration $registration */
            $registration = $form->getData();

            $this->entityManager->persist($registration);

            $this->entityManager->flush();

            return $this->redirectToRoute('registration');
        }


        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
