<?php

namespace Models\Repository\Product;

use Models\Repository\Model;
use Models\Entity\Product\Composition;
use Models\Entity\Product\Product;
use Models\Repository\Ingredient\IngredientRepository;
use PDO;

class CompositionRepository extends Model
{
    protected $table = "product_composition";

    public function insert(Product $product, Composition $composition)
    {
        $data['product_id'] = $product->getId();

        foreach ($composition->getIngredientsWithPositions() as $ingredientPosition) {
            $data['ingredient_id'] = ($ingredientPosition['ingredient'])->getId(); 
            $data['position'] = $ingredientPosition['position'];

            $this->insertInDatabase($data);
        }
    }

    public function find(int $product_id): array
    {
        $sql = sprintf("SELECT * FROM %s WHERE product_id=:product_id ORDER BY position", $this->table);
        $query = $this->pdo->prepare($sql);

        $query->bindValue(':product_id', $product_id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    public function getObject($dataFetch): Composition
    {
        $newComposition = [];
        
        foreach($dataFetch as $data) {
            $ingredientData = (new IngredientRepository())->find($data['ingredient_id']);

            if (false === $ingredientData) {
                return false;
            }
            $newComposition[] = (new IngredientRepository())->getObject($ingredientData);
        }

        $newComposition = Composition::sortComposition($newComposition);

        return new Composition($newComposition);
    }
}