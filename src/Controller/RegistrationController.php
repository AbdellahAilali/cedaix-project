<?php
/**
 * Created by PhpStorm.
 * User: abdellah
 * Date: 13/10/18
 * Time: 12:34
 */

namespace App\Controller;

use App\Entity\Registration;
use App\Entity\SchoolBoy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class RegistrationController extends AbstractController
{
    public function newRegistration(Request $request)
    {
        $shoolBoy = new SchoolBoy();

        $form = $this->createFormBuilder($shoolBoy)
            ->add('lastname', TextType::class)
            ->add('firstname', TextType::class)
            ->add('dateOfBirth', DateType::class)
            ->add('dateInscription', DateType::class)
            ->add('classes', TextType::class)
            ->getForm();

        return $this->render('registration.html.twig', array('form' => $form->createView(),
        ));
    }

}