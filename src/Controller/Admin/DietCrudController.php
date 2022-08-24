<?php

namespace App\Controller\Admin;

use App\Entity\Diet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DietCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Diet::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
