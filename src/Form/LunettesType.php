<?php

namespace App\Form;

use App\Entity\Lunettes;
use App\Entity\Marque;
use App\Entity\Forme;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LunettesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', HiddenType::class)
            ->add('slug', HiddenType::class)
            ->add('ref')
            ->add('type', ChoiceType::class, [
                'placeholder' => 'Choisissez une type',
                'choices' => [
                    'Lunettes de vue' =>'vue',
                    'Lunettes de soleil' => 'soleil',
                    'Lunettes de contact' => 'contact'
                ]
            ])
            ->add('genre', ChoiceType::class, [
                'choices' => [
                    'Homme' =>'h',
                    'Femme' => 'f',
                    'Mixte' => 'm'
                ],
                'label' => false,
                'expanded' => true
            ])
            ->add('image', FileType::class, [
                'multiple' => true,
                'mapped' => false
            ])
            ->add('forme', EntityType::class, [
                'class' => Forme::class,
                'placeholder' => 'Choisissez une forme'
            ])
            ->add('style')
            ->add('Color')
            ->add('matiere', ChoiceType::class, [
                'placeholder' => 'Choisissez une matiere',
                'choices' => [
                    'Métal' => 'metal',
                    'Plastique' => 'plastic',
                    'Titane' => 'titane',
                ],
                'expanded' => true
            ])
            ->add('prix')
            ->add('taille', ChoiceType::class, [
                'placeholder' => 'Choisissez un taille',
                'choices' => [
                    'Adulte L' => 'l',
                    'Adulte M' => 'm',
                    'Adulte S' => 's',
                ],
                'expanded' => true
            ])
            ->add('marque', EntityType::class, [
                'class' => Marque::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lunettes::class,
        ]);
    }
}
