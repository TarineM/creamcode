<?php

namespace Models\Repository\Product;

use Models\Repository\Model;
use Models\Entity\Product\Product;

class AlternativeProductRepository extends Model
{
    protected $table = "product_alternative";

    public function insert(Product $product)
    {
        $data['original_id'] = $product->getId();

        foreach ($product->getAlternativeProducts() as $alternativeProduct) {
            $data['alternative_id'] = $alternativeProduct->getId();

            $this->insertInDatabase($data);
        }
    }

    public function findAlternatives(Product $product)
    {
        $resultats = $this->pdo->query("SELECT * FROM {$this->table} WHERE original_id = :id");

        
    }
}