<?php

namespace App\Controller\Admin;

use App\Entity\Allergen;
use App\Entity\Diet;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
   // public function configureFields(string $registerAdmin): iterable
   // {
   //     return [
            
   //         ChoiceType::class, [
   //             'choices' => [
   //                 new Allergen('Gluten'),
   //                 new Allergen('Crustacés'),
   //                 new Allergen('Oeufs'),
   //                 new Allergen('Arachides'),
   //                 new Allergen('Poisson'),
   //                 new Allergen('Soja'),
   //                 new Allergen('Lait'),
   //                 new Allergen('Fruits à coques')
                    
    //            ],
    //            ChoiceType::class, [
    //                'choices' => [
    //                    new Diet('Protéiné'),
    //                    new Diet('Hypocalorique'),
    //                    new Diet('Végétarien'),
    //                    new Diet('Hyposodé'),

                        
      //              ]
      //          ]    
      //      ]
            
      //  ]        
    
    //;
   // }
    
}
