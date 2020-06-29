<?php

namespace Models\Repository\Ingredient;

use Models\Repository\Model;
use Models\Entity\Ingredient\IngredientImpact;

class IngredientImpactRepository extends Model
{
    protected $table = "ingredient_impact";

    public function insert(IngredientImpact $ingredientImpact): void
    {
        $data['impact_level'] = $ingredientImpact->getImpactLevel();
        $data['color'] = $ingredientImpact->getColor();
        
        $this->insertInDatabase($data);
    }

    public function getObject(array $dataFetch): IngredientImpact
    {   
        return new IngredientImpact($dataFetch);
    }
}