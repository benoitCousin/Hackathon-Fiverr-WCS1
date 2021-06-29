<?php

namespace App\Form;

use App\Entity\Challenge;
use App\Entity\Difficulty;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ChallengeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Saisissez le titre de votre challenge :',
                'label_attr' => ['class' => 'fs-4 mt-4'],
                'attr' => [
                    'class' => 'form-control mb-4',
                    'placeholder' => 'Titre'    
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Décrivez votre énoncé :',
                'label_attr' => ['class' => 'fs-4 mt-4'],
                'attr' => [
                    'class' => 'form-control mb-4',
                    'placeholder' => 'Enoncé'    
                ]
            ])
            ->add('link', TextType::class, [
                'label' => 'Lien vers votre challenge :',
                'label_attr' => ['class' => 'fs-4 mt-4'],
                'attr' => [
                    'class' => 'form-control mb-4',
                    'placeholder' => 'Lien'    
                ]
            ])
            ->add('validation', TextareaType::class, [
                'label' => 'Indiquez vos critères de validation :',
                'label_attr' => ['class' => 'fs-4 mt-4'],
                'attr' => [
                    'class' => 'form-control mb-4',
                    'placeholder' => 'Critères'    
                ]
            ])
            ->add('difficultyLevel', EntityType::class, [
                'label' => 'Estimation du niveau de votre challenge :',
                'label_attr' => ['class' => 'fs-4 mt-4'],
                'attr' => ['class' => 'form-select mb-4'],
                'class' => Difficulty::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'by_reference' => false 
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Challenge::class,
        ]);
    }
}
