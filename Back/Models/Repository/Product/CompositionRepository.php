<?php

namespace Models\Repository\Product;

use Models\Repository\Model;
use Models\Entity\Product\Composition;
use Models\Entity\Product\Product;

class CompositionRepository extends Model
{
    protected $table = "product_composition";

    public function insert(Product $product, Composition $composition)
    {
        $data['product_id'] = $product->getId();

        foreach ($composition->getIngredientsWithPositions() as $position => $ingredient) {
            $data['ingredient_id'] = $ingredient->getId(); 
            $data['position'] = $position;

            $this->insertInDatabase($data);
        }
    }
}