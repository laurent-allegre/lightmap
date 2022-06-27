<?php

namespace App\Form;

use App\Entity\Parcours;
use App\Entity\Scomplementaire;
use Cassandra\Date;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class SequenceComplementaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label' => 'Nom de la Séquence :',
                'constraints' => new Length([
                    'min' => 4,
                    'max' => 80
                ])
            ])
            ->add('preconisations', TextType::class,[
                'label' => 'Préconisation de la Séquence :',
                'constraints' => new Length([
                    'min' => 4,
                    'max' => 60
                ])
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


            //  ->add('parcour')

            ->add('submit', SubmitType::class,[
                'label' => "validation de la sequence",
                'attr' => ['class' => 'btn btn-outline-light btn-lg']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Scomplementaire::class,
        ]);
    }
}
