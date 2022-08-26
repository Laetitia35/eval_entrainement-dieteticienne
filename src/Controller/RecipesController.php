<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Recipe;
use App\Entity\Recipes;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    
    #[Route('/recettes', name: 'app_recipes')]
    public function index(Request $request): Response
    {
        $search = new search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $recipes = $this->entityManager->getRepository(Recipes::class)->findWithSearch($search);

        } else {
            $recipes = $this->entityManager->getRepository(Recipes::class)->findAll();
        }

        return $this->render('recipes/index.html.twig', [
            'recipes' => '$recipes',
            'form' => $form->createView()
        ]);
    }

    #[Route('/recette/{slug}', name: 'app_recipes')]
    public function show($slug): Response
    {
        $recipe = $this->entityManager->getRepository(Recipes::class)->findOneBySlug($slug);

        if (!$recipe) {
            return $this->redirectToRoute('app_recipes');
        }

        return $this->render('recipes/show.html.twig', [
            'recipes' => '$recipes',
            
        ]);
    }
}
