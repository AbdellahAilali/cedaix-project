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
            ->add('email', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field should be not blank.'])
                ],
                'label' => 'Mail address',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('address', AddressType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field should be not blank.'])
                ],
            ]);
    }

    public function getParent()
    {
        return ParentsType::class;
    }
}