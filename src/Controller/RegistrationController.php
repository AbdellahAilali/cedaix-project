<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegistrationType;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function index()
    {
        $form = $this->createForm(RegistrationType::class);

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
