<?php

namespace App\Form;

use App\Entity\Parcours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class NewParcoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomParcours',TextType::class, [
            'label' => "Nom du parcours souhaité :",
            'constraints' => new Length([
                'min' => 4,
                'max' => 60
            ])
        ])
            ->add('nomEntreprise',TextType::class, [
                'label' => "Nom de l'entreprise :",
                'constraints' => new Length([
                    'min' => 4,
                    'max' => 60
                ])
            ])
            ->add('numeroSiret',TextType::class, [
                'label' => "Numero de siret :",
                'constraints' => new Length([
                    'min' => 14,
                    'max' => 16
                ])
            ])
            ->add('nomApprenant',TextType::class, [
                'label' => "Nom de l'apprenant :",
                'constraints' => new Length([
                    'min' => 4,
                    'max' => 30
                ])
            ])
            ->add('prenomApprenant',TextType::class, [
                'label' => "Prénom de l'apprenant :",
                'constraints' => new Length([
                    'min' => 4,
                    'max' => 30
                ])
            ])
            ->add('posteOccupe',TextType::class, [
                'label' => "Poste occupé  :",
                'constraints' => new Length([
                    'min' => 4,
                    'max' => 60
                ])
            ])

            ->add('submit', SubmitType::class,[
                'label' => "validation du parcours",
                'attr' => ['class' => 'btn btn-outline-light btn-lg']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Parcours::class,
        ]);
    }
}
