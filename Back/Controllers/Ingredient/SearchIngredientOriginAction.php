<?php

namespace Controllers\Ingredient;

use Controllers\Controller;
use Models\Repository\Ingredient\IngredientOriginRepository;

class SearchIngredientOriginAction extends Controller
{
    protected $repositoryName = IngredientOriginRepository::class;

    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            $pageTitle = "Rechercher une origine d'ingrédient";
            
            \Renderer::render('Ingredient/search_ingredient_origin', compact('pageTitle'));
        }
    }
}