<?php
/**
 * Created by PhpStorm.
 * User: abdellah
 * Date: 13/10/18
 * Time: 18:10
 */

namespace App\Form;


use App\Entity\Matter;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;


class MatterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', ChoiceType::class, [
                'constraints'=> [
                    new NotBlank(['message' => 'The field "name" should be not blank.'])
                ],
                'label' => 'Matière',


            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Matter::class,
        ));
    }
}