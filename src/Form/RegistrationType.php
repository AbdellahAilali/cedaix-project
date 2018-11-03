<?php

namespace App\Form;

use App\Entity\Matter;
use App\Entity\Registration;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Collection;


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
            ->add('father', FatherType::class, [
                'label' => 'Informations sur les parents',
            ])
            ->add('mother', MotherType::class)
            ->addEventListener(FormEvents::SUBMIT, [$this, 'onPostSubmit']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Registration::class,
            'attr' => array('novalidate' => 'novalidate')
        ));
    }

    public function onPostSubmit(FormEvent $event)
    {
        /** @var Registration $registration */
        $registration = $event->getData();

        if ($registration->getFather()->getAddress()) {
            $registration->getMother()->setAddress($registration->getFather()->getAddress());
        }

        if ($registration->getFather()->getEmail()) {
            $registration->getMother()->setEmail($registration->getFather()->getEmail());
        }
    }
}