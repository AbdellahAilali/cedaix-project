<?php
/**
 * Created by PhpStorm.
 * User: abdellah
 * Date: 13/10/18
 * Time: 18:19
 */

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
            ->add('lastname', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "lastname" should be not blank.'])
                ]
            ])
            ->add('firstname', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'The field "fistname" should be not blank.'])
                ]
            ])
            ->add('address', AddressType::class, [

            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Parents::class,
        ));
    }

}