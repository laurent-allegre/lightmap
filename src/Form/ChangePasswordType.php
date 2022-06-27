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

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'disabled' => true
            ])
            ->add('nom', TextType::class, [
                'disabled' => true
            ])
            ->add('prenom', TextType::class, [
                'disabled' => true
            ])
            ->add('old_password', PasswordType::class, [
                'label' => 'Votre mot de passe actuel',
                'mapped' => false,
                'attr'=>[
                    'placeholder' => 'veuillez saisir votre mot de passe actuel'
                ]
            ])
            ->add('new_password', RepeatedType::class,[
                'type' => PasswordType::class,
                'mapped'=> false,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique',
                'label' => 'Votre nouveau mot de passe',
                'required' => true,
                'first_options' => ['label' => 'Mon nouveau mot de passe'],
                'second_options' => [ 'label' => 'Confirmez votre nouveau mot de passe']
            ])
            ->add('submit', SubmitType::class,[
                'label' => "Valider"
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
