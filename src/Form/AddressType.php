<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address1', TextType::class, [
                'constraints' => [
                    new NotBlank(['message'=>'The field should be not blank.'])
                ],
                'label' => 'Adresse 1',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('address2',TextType::class,[
                'label' => 'Adresse 2',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('postalCode',TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field should be not blank.'])
                ],
                'label' => 'Code Postale',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('city',TextType::class, [
                'constraints'=> [
                    new NotBlank(['message'=> 'The field should be not blank.'])
                ],
                'label' => 'Ville',
                'attr' => ['class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Address::class,
        ));
    }

}