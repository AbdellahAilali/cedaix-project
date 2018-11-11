<?php

namespace App\Form;

use App\Form\DTO\CreateRegistrationDTO;
use App\Entity\Matter;
use App\Entity\Registration;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('schoolBoys', CollectionType::class, [
                'entry_type' => SchoolBoyType::class,
                'allow_add' => true
            ])
            ->add("matters", EntityType::class, [
                'class' => Matter::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('father', FatherType::class, ['by_reference' => false])
            ->add('mother', MotherType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CreateRegistrationDTO::class
        ));
    }
}
