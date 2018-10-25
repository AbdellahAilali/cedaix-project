<?php

namespace App\Form;

use App\Entity\Matter;
use App\Entity\Registration;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class RegistrationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('schoolBoy', SchoolBoyType::class)
            ->add("matter", EntityType::class, [
                'class' => Matter::class,
                'multiple' => true,
                'expanded' => true,
                /*'attr' => ['id' => 'customCheck1'],*/
                /*'choice_attr' => function ($choiceValue, $key, $value) {
                    return ['value'=>$value];
                },*/
                'choice_label' => function (Matter $matter) {
                    return $matter->getName() . ' ' . $matter->getPrice();
                }

            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Registration::class,
            'attr' => array('novalidate' => 'novalidate')
        ));
    }
}