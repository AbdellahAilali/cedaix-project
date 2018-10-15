<?php

namespace App\Form;

use App\Entity\Classes;
use App\Entity\Parents;
use App\Entity\SchoolBoy;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "lastname" should be not blank.'])
                ],
                'label' => 'Nom de Famille',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "firstname" should be not blank.']),
                ],
                'label' => 'Prénom',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('dateOfBirth', DateType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "dateOfBirth" should be not blank.']),
                ],
                'label' => 'Date de naissance',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('birthplace', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "birthplace" should be not blank.']),
                ],
                'label' => 'Lieu de naissance',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('classes', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'name',
                'constraints' => [
                    new NotBlank(['message' => 'The field "classes" should be not blank.']),
                ],
                'label' => 'Classe/Niveau'
            ])
            ->add('father', FatherType::class, [
                'label' => 'Informations sur les parents'

            ])
            ->add('mother', MotherType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => SchoolBoy::class,
        ));
    }
}