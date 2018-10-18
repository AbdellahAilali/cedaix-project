<?php

namespace App\Form;

use App\Entity\Parents;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', TextType::class, [
                'attr' => ['class' => 'form-control input_field'],
            ])
            ->add('firstName', TextType::class, [
                'attr' => ['class' => 'form-control input_field'],
            ])
            ->add('phone', TextType::class, [
                'attr' => ['class' => 'form-control input_field'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Parents::class,
        ));
    }
}
