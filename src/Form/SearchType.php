<?php

namespace App\Form;

use App\Classe\search;
use App\Entity\Allergen;
use App\Entity\Diet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('string', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Votre recherche...',
                    'class' => 'form-control-sm'
                ]
            ])

            ->add ('allergen', EntityType::class, [
                    'label' => false,
                    'required' => false,
                    'class' => Allergen::class,
                    'multiple'=> true,
                    'expanded' => true
            ])

            ->add ('diet', EntityType::class, [
                    'label' => false,
                    'required' => false,
                    'class' => Diet::class,
                    'multiple'=> true,
                    'expanded' => true
            ])

            ->add ('submit', SubmitType::class, [
                    'label' =>'Filtrer',
                    'attr' => [
                        'class' =>'btn-block btn-info'
                    ]
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => search::class,
            'method' => 'GET', 
            'crsf_protection' => false,
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
