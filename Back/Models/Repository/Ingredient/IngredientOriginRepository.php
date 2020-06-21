<?php

namespace Models\Repository\Ingredient;

use Models\Repository\Model;
use Models\Entity\Ingredient\IngredientOrigin;

class IngredientOriginRepository extends Model
{
    protected $table = "ingredient_origin";

    public function insert(IngredientOrigin $ingredientOrigin): void
    {
        $data['name'] = $ingredientOrigin->getName();

        $this->insertInDatabase($data);
    }
}
