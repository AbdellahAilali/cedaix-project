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
                'attr' => ['class' => 'form-control input_field',
                    'placeholder ' => 'Adresse 1'],
            ])
            ->add('address2', TextType::class, [
                'attr' => ['class' => 'form-control input_field',
                    'placeholder ' => 'Adresse 2'],
            ])
            ->add('postalCode',TextType::class, [
                'attr' => ['class' => 'form-control input_field',
                    'placeholder ' => 'Code postale'],
            ])
            ->add('city',TextType::class, [
                'attr' => ['class' => 'form-control input_field',
                    'placeholder ' => 'Ville'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Address::class,
        ));
    }

}