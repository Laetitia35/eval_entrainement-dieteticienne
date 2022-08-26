<?php

namespace App\Classe;

use App\Entity\Allergen;
use App\Entity\Diet;

class Search 
{
    /** 
    * @var string
    */
    public $string = '';

     /** 
    * @var Allergen [] 
    */
    public $allergen = [];

     /** 
    * @var Diet [] 
    */
    public $diet = [];
}