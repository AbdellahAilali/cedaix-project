<?php

namespace App\Form;

use App\Entity\Registration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;


class RegistrationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('schoolBoy', SchoolBoyType::class, [
                'label' => 'Informations sur l\'élève'

            ])
            ->add("mattter", MatterType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "fistname" should be not blank.'])
                ]
            ])
           ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Registration::class,
            'attr'=>array('novalidate'=>'novalidate')
        ));
    }
}