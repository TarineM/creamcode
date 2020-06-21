<?php

namespace Controllers\Ingredient;

use Models\Repository\Ingredient\IngredientImpactRepository;
use Models\Entity\Ingredient\IngredientImpact;
use Controllers\Controller;

class GetIngredientImpactsAction extends Controller
{
    protected $repositoryName = IngredientImpactRepository::class;

    public function __invoke()
    {   
        $impactsPresenter = $this->getAllData();

        $pageTitle = 'Tous les d\'impact d\'ingrédient';
        
        \Renderer::render('Ingredient/get_ingredient_impacts', compact('pageTitle', 'impactsPresenter'));
    }

    public function getAllData()
    {
        $impacts = $this->repository->findAll();

        $impactsPresenter = [];

        foreach($impacts as $impact) {
            $impactsPresenter[] = new IngredientImpact($impact);
        }

        return $impactsPresenter;
    }
}