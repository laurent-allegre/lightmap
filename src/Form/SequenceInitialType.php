<?php

namespace App\Form;

use App\Entity\PreRequis;
use App\Entity\SpositionInitial;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SequenceInitialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label' => 'Nom de la séquence :',
                'constraints' => new Length([
                    'min' => 4,
                    'max' => 80
                ]),
                'constraints' => [
                    new NotBlank (['message' => 'Veuillez entrer un nom à la séquence'])
                ]

            ])
            ->add('contexte', TextType::class,[
                'label' => 'Contexte de la Séquence :',
                'constraints' => new Length([
                    'min' => 4,
                    'max' => 60
                ])
            ])

           ->add('preRequis',CollectionType::class, [
                 'entry_type' => PreRequisType::class,
                 'label' => false,
                 'entry_options' => ['label' => false],
                 'error_bubbling' => true,
                 'allow_add' => true,
                 'allow_delete' => true,
                 'prototype' => true,
                 'by_reference' => false

            ])

            ->add('objectifCompetences',CollectionType::class, [
                'entry_type' => ObjectifCompetenceType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false

            ])

            ->add('dateDebut', DateType::class,[
                'label' => 'Date de début :',
                'widget' => 'single_text',
                'html5' => true
            ])
            ->add('heureDebut', TimeType::class, [
                'label' => 'Heure de début :',
                'widget' => 'single_text',
                'html5' => true
            ])
            ->add('dateFin', DateType::class,[
                'label' => 'Date de fin :',
                'widget' => 'single_text',
                'html5' => true
            ])
            ->add('heureFin', TimeType::class, [
                'label' => 'Heure de fin :',
                'widget' => 'single_text',
                'html5' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SpositionInitial::class,
        ]);
    }
}
