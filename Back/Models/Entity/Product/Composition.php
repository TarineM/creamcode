<?php

namespace Models\Entity\Product;

use Models\Entity\Ingredient\Ingredient;

class Composition
{
    /**
     * @var array
     */
    private $ingredientsWithPositions;

    public function __construct(array $data)
    {
        $this->setIngredientsWithpositions($data);
    }

    public function getIngredientsWithPositions(): array
    {
        return $this->ingredientsWithPositions;
    }

    public function setIngredientsWithpositions(array $ingredientsWithPositions): void
    {
        $this->ingredientsWithPositions = $ingredientsWithPositions;

    }

    /**
     * Ranger la composition du produit pour obtenir une liste INCI correcte
     * @param array $composition
     * @return array
     */
    public static function sortComposition(array $ingredientList)
    {
        $newList = [];

        for ($i=0; $i < count($ingredientList); $i++)
        {
            if (false === ($ingredientList[$i] instanceof Ingredient)) {
                return false;
            }

            $newList[] = [
                'position' => $i+1,
                'ingredient' => $ingredientList[$i],
            ];
        }

        return $newList;
    }
}
