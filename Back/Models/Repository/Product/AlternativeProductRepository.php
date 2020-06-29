<?php

namespace Models\Repository\Product;

use Models\Repository\Model;
use Models\Entity\Product\Product;
use PDO;

class AlternativeProductRepository extends Model
{
    protected $table = "product_alternative";

    public function insert(Product $originalProduct, Product $alternativeProduct)
    {
        $data['original_id'] = $originalProduct->getId();
        $data['alternative_id'] = $alternativeProduct->getId();

        $this->insertInDatabase($data);
    }

    public function findAlternatives(Product $product)
    {
        $sql = sprintf("SELECT * FROM %s WHERE original_id = :id", $this->table);

        $query = $this->pdo->prepare($sql);

        $query->bindValue(':id', $product->getId(), PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }
}