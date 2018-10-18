<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;

class MotherType extends AbstractType
{
    public function getParent()
    {
        return ParentsType::class;
    }
}
