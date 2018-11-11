<?php

namespace App\Form;

use App\Form\DTO\CreateAddressDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address1', TextType::class, [
                'label' => 'app.ui.address1',
            ])
            ->add('address2', TextType::class, [
                'label' => 'app.ui.address2',
                'required' => false,
            ])
            ->add('postalCode', TextType::class, [
                'label' => 'app.ui.postalCode',
            ])
            ->add('city', TextType::class, [
                'label' => 'app.ui.city',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CreateAddressDTO::class,
        ));
    }
}
