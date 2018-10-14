<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegistrationType;

class RegistrationController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager)
    {

    }

    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(RegistrationType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $em->persist()
            // $em->flush()

            // redirection "Votre inscription a bien été prise en compte";
        }


        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
