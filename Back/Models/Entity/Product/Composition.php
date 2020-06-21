<?php

namespace Models\Entity\Product;

use Models\Entity\Ingredient;

class Composition
{
    /**
     * @var array
     * positions are keys number
     * 0 => ingredient1
     * 1 => ingredient2
     */
    private $ingredientsWithPositions;

    public function __construct(array $data)
    {
        $this->setIngredientsWithpositions($data['ingredientsWithPositions']);
    }

    public function getIngredientsWithPositions(): ?array
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
    public static function sortComposition(array $ingredientList): ?array
    {
        $newList = [];
        $error = 0;

        for ($i=0; $i < count($ingredientList); $i++)
        {
            if ($ingredientList[$i] instanceof Ingredient) {
                $newList[$i] = $ingredientList[$i];
            }
            else
            {
                $error+= 1;
            }
        }

        return  ($error > 0 ? $newList : null);
    }

}
