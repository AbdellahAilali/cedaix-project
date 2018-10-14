<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FatherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "lastname" should be not blank.'])
                ],
                'label' => 'Nom du père (tuteur)'
            ])
            ->add('phone', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "phone" should be not blank.'])
                ],
                'label' => 'téléphone'
            ])
            ->add('email', TextType::class, [
                'constraints' => [
                    new NotBlank(['message'=> 'The field "email" should be not blank.'])
                ],
                'label' => 'Adresse Mail'
            ])
            ->add('address', AddressType::class, [
                'constraints' => [
                    new NotBlank(['message'=> 'The field "email" should be not blank.'])
                ]
            ]);
    }

}