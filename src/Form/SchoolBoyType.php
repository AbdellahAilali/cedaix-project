<?php

namespace App\Form;

use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;


class SchoolBoyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class,[
                'constraints' => [
                     new NotBlank(['message' => 'The field "lastname" should be not blank.'])
                ]
            ])
            ->add('firstname', TextType::class,[
                'constraints' => [
                    new NotBlank(['message' => 'The field "firstname" should be not blank.'])
                ]
            ])
            ->add('dateOfBirth', DateType::class, [
                'contraonts' => [
                    new NotBlank(['message' => 'The field "dateOfBirth" should be not blank.'])
                ]
            ])
            ->add('classes', ClassesType::class, [
                'contraints' => [
                    new NotBlank(['message' => 'The field "classes" should be not blank.'])
                ]
            ]);
    }
}