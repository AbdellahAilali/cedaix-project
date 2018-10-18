<?php

namespace App\Form;

use App\Entity\Classes;
use App\Entity\SchoolBoy;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SchoolBoyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', TextType::class, [
                'attr' => ['class' => ' input_field form-control',
                ]

            ])
            ->add('firstName', TextType::class, [
                'attr' => ['class' => 'form-control input_field']
            ])
            ->add('birthDate', DateType::class, [
                'attr' => ['class' => 'form-control', 'id' => 'date_regist'],
                'widget' => 'single_text',
                'label' => 'birthDay'
            ])
            ->add('birthplace', TextType::class, [
                'attr' => ['class' => 'form-control input_field ']
            ])
            ->add('classes', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'name',
                'attr' => ['id' => 'inputGroupSelect01'],
            ])
            ->add('father', FatherType::class, [
                'label' => 'Informations sur les parents',
            ])
            ->add('mother', MotherType::class)
            ->addEventListener(FormEvents::POST_SUBMIT, [$this, 'onPostSubmit']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => SchoolBoy::class,
        ));
    }

    public function onPostSubmit(FormEvent $event)
    {
        /** @var SchoolBoy $schoolBoy */
        $schoolBoy = $event->getData();

        if ($schoolBoy->getFather()->getAddress()) {
            $schoolBoy->getMother()->setAddress($schoolBoy->getFather()->getAddress());
        }

        if ($schoolBoy->getFather()->getEmail()) {
            $schoolBoy->getMother()->setEmail($schoolBoy->getFather()->getEmail());
        }
    }
}
