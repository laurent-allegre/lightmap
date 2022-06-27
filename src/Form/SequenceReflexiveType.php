<?php

namespace App\Form;

use App\Entity\SequenceReflexive;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class SequenceReflexiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label'=> 'Nom de la séquence',
                'constraints' => new Length([
                    'min' => 4,
                    'max' => 80
                ])
            ])

            ->add('narrers', CollectionType::class,[
                'entry_type' => NarrerType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('questionners', CollectionType::class,[
                'entry_type' => QuestionnerType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('consciences', CollectionType::class,[
                'entry_type' => ConscienceType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('difficulters', CollectionType::class,[
                'entry_type' => DifficulterType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('preferences', CollectionType::class,[
                'entry_type' => PreferenceType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('argconts', CollectionType::class,[
                'entry_type' => ArgcontType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('argpros', CollectionType::class,[
                'entry_type' => ArgproType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('objectifs', CollectionType::class,[
                'entry_type' => ObjectifType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('pratiques', CollectionType::class,[
                'entry_type' => PratiqueType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('diags', CollectionType::class,[
                'entry_type' => DiagType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('proposers', CollectionType::class,[
                'entry_type' => ProposerType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('explorers', CollectionType::class,[
                'entry_type' => ExplorerType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('formulers', CollectionType::class,[
                'entry_type' => FormulerType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('dateDebut', DateType::class,[
                'widget' => 'single_text',
                'html5' => true
            ])
            ->add('heureDebut', TimeType::class, [
                'widget' => 'single_text',
                'html5' => true
            ])
            ->add('dateFin', DateType::class,[
                'widget' => 'single_text',
                'html5' => true
            ])
            ->add('heureFin', TimeType::class, [
                'widget' => 'single_text',
                'html5' => true
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SequenceReflexive::class,
        ]);
    }
}
