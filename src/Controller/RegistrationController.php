<?php

namespace App\Controller;

use App\Entity\Matter;
use App\Form\DTO\CreateRegistrationDTO;
use App\Form\DTO\CreateSchoolBoyDTO;
use App\Form\RegistrationType;
use App\Manager\RegistrationManager;
use App\Mapper\DTOToEntityRegistrationMapper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

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

     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    /**
     * @Route("/registration", name="registration")
     *
     * @param Request $request
     * @param DTOToEntityRegistrationMapper $registrationMapper
     * @return RedirectResponse|Response
     */
    public function create(Request $request, DTOToEntityRegistrationMapper $registrationMapper, RegistrationManager $manager)
    {
        $matters = $this->getDoctrine()->getManager()->getRepository(Matter::class)->findAll();

        $registration = new CreateRegistrationDTO();
        $registration->addSchoolBoy(new CreateSchoolBoyDTO());

//        $request->setLocale('fr');
        $form = $this->createForm(RegistrationType::class, $registration);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var CreateRegistrationDTO $registrationDTO */
            $registrationDTO = $form->getData();

            $registration = $registrationMapper->map($registrationDTO);
            $manager->save($registration);

            return $this->redirectToRoute('registration');
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
            'matters' => $matters,
        ]);
    }
}
