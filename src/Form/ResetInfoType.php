<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ResetInfoType extends AbstractType
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civility', ChoiceType::class, [
                'attr' => ['class' => 'ace-form-control'],
                'choices' => [
                    'M ' => 'm',
                    'Mme ' => 'mme'
                ],
                'label' => false,
                'expanded' => true,
                'data'=> $this->security->getUser()->getCivility()
            ])
            ->add('firstname')
            ->add('lastname')
            ->add('birthday', DateType::class, array( 
                       'widget' => 'text',
                    ))
            ->add('tel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
