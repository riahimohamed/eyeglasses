<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civility', ChoiceType::class, [
                'choices' => [
                    'M' =>'m',
                    'Mme' => 'mme',
                ]
            ])
            ->add('firstname')
            ->add('lastname')
            ->add('birth_day', DateType::class, [
                'widget'  => 'single_text',
                'input'  => 'datetime_immutable'
            ])
            ->add('tel')
            ->add('email')
            ->add('password', RepeatedType::class, [
              'type' => PasswordType::class,
              'invalid_message' => 'Les champs de mot de passe doivent correspondre.',
              'required' => true,
              'first_options'  => ['label' => 'Mot de passe'],
              'second_options' => ['label' => 'Confirmation mot de passe'],
        ]);    
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
