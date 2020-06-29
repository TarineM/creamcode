<?php

namespace Controllers\Ingredient;

use Models\Repository\Ingredient\IngredientRepository;
use Models\Repository\Ingredient\IngredientImpactRepository;
use Models\Repository\Ingredient\IngredientOriginRepository;
use Models\Entity\Ingredient\Ingredient;
use Models\Entity\Ingredient\IngredientImpact;
use Models\Entity\Ingredient\IngredientOrigin;
use Controllers\Controller;

class GetIngredientsAction extends Controller
{
    protected $repositoryName = IngredientRepository::class;

    public function __invoke()
    {   
        $ingredientsPresenter = $this->getAllData();
        $pageTitle = 'Tous les ingrédients';
        
        \Renderer::render('Ingredient/get_ingredients', compact('pageTitle', 'ingredientsPresenter'));
    }

    public function getAllData()
    {
        $ingredients = $this->repository->findAll();

        $ingredientsPresenter = [];

        foreach($ingredients as $ingredient) {
            $ingredientsPresenter[] = $this->repository->getObject($ingredient);

        }
        return $ingredientsPresenter;
    }
}