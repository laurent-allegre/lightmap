<?php

namespace App\Form;

use App\Entity\Formateurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => "Votre Nom :",
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ])
            ])
            ->add('prenom', TextType::class,[
                'label' => "Votre Prénom :",
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ])
            ])
            ->add('adresse', TextType::class,[
                'label' => 'Votre Adresse :'
            ])
            ->add('codePostal')
            ->add('ville', TextType::class,[
                'label' => 'Votre ville :'
            ])
            ->add('entreprise', TextType::class,[
                'label' => 'Votre Entreprise :'
            ])
            ->add('poste', TextType::class,[
                'label' => 'Votre poste occupé :'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre émail :',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 50
                ])
            ])
            ->add('password', RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique',
                'label' => 'Votre mot de passe :',
                'required' => true,
                'first_options' => ['label' => false],
                'second_options' => [ 'label' => 'Confirmez votre mot de passe :']
            ])

            ->add('submit', SubmitType::class,[
                'label' => "S'inscrire",
                'attr' => ['class' => 'btn btn-outline-light btn-lg']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formateurs::class,
        ]);
    }
}
