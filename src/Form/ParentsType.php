<?php

namespace App\Form;

use App\Form\DTO\CreateParentsDTO;
use App\Entity\Parents;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', TextType::class, [
                'label' => 'app.ui.lastName'
            ])
            ->add('firstName', TextType::class, [
                'label' => 'app.ui.firstName'
            ])
            ->add('phone', TextType::class, [
                'label' => 'app.ui.phone'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CreateParentsDTO::class,
        ));
    }
}
