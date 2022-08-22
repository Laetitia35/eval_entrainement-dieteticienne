<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('firstname', TextType::class, [
                'label' =>'Prenom :',
                'constraint' => new Length([
                    'min' => 2,
                    'max' => 30,
                ]),
                'attr' =>[
                    'placeholder' => 'Merci de saisir le prenom du patient'
                ]
            ])

            ->add ('lastname',  TextType::class, [
                'label' =>'Nom :',
                'constraint' => new Length([
                    'min' => 2,
                    'max' => 30,
                ]),
                'attr' =>[
                    'placeholder' => 'Merci de saisir le nom du patient'
                ]
            ])

            ->add('email',   EmailType::class, [
                'label' =>'Email :',
                'constraint' => new Length ([
                    'min' => 2,
                    'max' => 60,
                ]),
                'attr' =>[
                    'placeholder' => "Merci de saisir l'adresse email du patient"
                ]
            ])
            
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class, 
                'invalid_message' =>'Le mot de passe et la confirmation doivent être identique',
                'label' => 'Insérer le mot de passe générer',
                'required' => true,
                'first_options' => [
                    'label' =>'Mot de passe générer :',
                    'attr' => [
                        'placeholder' => 'Merci de saisir le mot de passe sécurisé générer aléatoirement.'
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe générer aléatoirement :',
                    'attr' => [
                        'placeholder' => 'Merci de confirmer la saisie du mot de passe sécurisé générer aléatoirement.'
                    ]
                    
                ]
                
            ])

            //->add('passwordGenerate', ButtonType::class, [
                //'label' =>'genérer le mot de passe aléatoire'
            //]) 

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
