<?php

namespace App\Form;

use App\Form\DTO\CreateMotherDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MotherType extends AbstractType
{
    public function getParent()
    {
        return ParentsType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CreateMotherDTO::class,
        ));
    }
}
