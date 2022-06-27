<?php

namespace App\Form;

use App\Entity\MiseEnSituation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class SequenceMiseEnSituationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label' => 'Nom de la séquence :',
                'constraints'=> new Length([
                    'min'=> 4,
                    'max'=> 80,
                ])
            ])
            ->add('lieu', TextType::class,[
                'label'=> 'Lieu de la séquence :',
                'constraints' => new Length([
                    'min' => 4,
                    'max' => 60
                ])
            ])
            ->add('outils', TextType::class,[
                'label'=> 'Outils à utiliser :'
            ])
            ->add('methode', TextType::class,[
                'label'=> 'Méthode utilisé :'
            ])

            ->add('taches', CollectionType::class,[
                'entry_type'=> TachesType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('resultats', CollectionType::class,[
                'entry_type'=> ResultatsType::class,
                'label' => false,
                'entry_options' => ['label' => false],
                'error_bubbling' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

            ->add('elementsPreuve', TextType::class,[
                'label' => 'Elements de preuve :'
                ])
            ->add('dateDebut',DateType::class,[
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
         //   ->add('parcour')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MiseEnSituation::class,
        ]);
    }
}
