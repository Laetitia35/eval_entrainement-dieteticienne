<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('firstname', TextType::class, [
                'label' =>'Prenom',
                'attr' =>[
                    'placeholder' => 'Merci de saisir le prenom du patient'
                ]
            ])

            ->add ('lastname',  TextType::class, [
                'label' =>'Nom',
                'attr' =>[
                    'placeholder' => 'Merci de saisir le nom du patient'
                ]
            ])

            ->add('email',   EmailType::class, [
                'label' =>'Email',
                'attr' =>[
                    'placeholder' => "Merci de saisir l'adresse email du patient"
                ]
            ])
            
            ->add('password', PasswordType::class, [
                'label' => ' Insérer le mot de passe générer',
                'attr' => [
                    'placeholder' => 'Merci de saisir le mot de passe générer'
                ]
            ])

            ->add('passwordGenerate', ButtonType::class, [
                'label' =>'genérer mot de passe'
            ]) 

            ->add('submit', SubmitType::class, [
                'label' => "Valider l'inscription"
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
