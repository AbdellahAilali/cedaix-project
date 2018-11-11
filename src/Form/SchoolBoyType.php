<?php

namespace App\Form;

use App\Entity\Classes;
use App\Form\DTO\CreateSchoolBoyDTO;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SchoolBoyType
 * @package App\Form
 */
class SchoolBoyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', TextType::class, [
                'label' => 'app.ui.lastName'
            ])
            ->add('firstName', TextType::class, [
                'label' => 'app.ui.firstName'
            ])
            ->add('birthDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'app.ui.birthDate'
            ])
            ->add('birthplace', TextType::class, [
                'label' => 'app.ui.birthplace'
            ])
            ->add('classes', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'name',
                'placeholder' => 'app.ui.select_an_option',
                'attr' => ['class' => 'custom-select'],
                'label' => 'app.ui.classes'
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CreateSchoolBoyDTO::class,
        ));
    }
}
