<?php

namespace App\Form;

use App\Entity\Parents;
use App\Entity\SchoolBoy;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SchoolBoyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "lastname" should be not blank.'])
                ]
            ])
            ->add('firstname', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "firstname" should be not blank.'])
                ]
            ])
            ->add('dateOfBirth', DateType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "dateOfBirth" should be not blank.'])
                ]
            ])
            ->add('classes', ClassesType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "classes" should be not blank.'])
                ]
            ])
            ->add('father', ParentsType::class)
            ->add('mother', ParentsType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => SchoolBoy::class,
        ));
    }
}