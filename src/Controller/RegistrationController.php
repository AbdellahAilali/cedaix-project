<?php

namespace App\Controller;

use App\Entity\Matter;
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
        $matters = $this->getDoctrine()->getManager()->getRepository(Matter::class)->findAll();

        $registration = new Registration();
        $registration->addSchoolBoy(new SchoolBoy());
//        foreach ($matters as $matter) {
//            $registration->addMatter($matter);
//        }

        $request->setLocale('fr');
        $form = $this->createForm(RegistrationType::class, $registration);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var Registration $registration */
            $registration = $form->getData();

            $this->entityManager->persist($registration);

            $this->entityManager->flush();

            return $this->redirectToRoute('registration');
        } else {
            dump($form->getErrors(true));
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
