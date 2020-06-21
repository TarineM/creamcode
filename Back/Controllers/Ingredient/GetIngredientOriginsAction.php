<?php

namespace Controllers\Ingredient;

use Models\Repository\Ingredient\IngredientOriginRepository;
use Models\Entity\Ingredient\IngredientOrigin;
use Controllers\Controller;

class GetIngredientOriginsAction extends Controller
{
    protected $repositoryName = IngredientOriginRepository::class;

    public function __invoke()
    {   
        $originsPresenter = $this->getAllData();
        
        $pageTitle = 'Toutes les origines d\'ingrédient';
        
        \Renderer::render('Ingredient/get_ingredient_origins', compact('pageTitle', 'originsPresenter'));
    }

    public function getAllData()
    {
        $origins = $this->repository->findAll();

        $originsPresenter = [];

        foreach($origins as $origin) {
            $originsPresenter[] = new IngredientOrigin($origin);
        }

        return $originsPresenter;

    }
}