<?php

namespace Models\Repository\Product;

use Models\Repository\Model;
use Models\Entity\Product\Product;

class ProductRepository extends Model
{
    protected $table = "cosmetic_product";

    public function insert(Product $product): void
    {
        $data['name'] = $product->getName();
        $data['has_alternative'] = $product->getHasAlternative();
        $data['brand_id'] = $product->getBrand()->getId();
        $data['type_id'] = $product->getType()->getId();
        $data['picture_id'] = $product->getPicture()->getId();

        $this->insertInDatabase($data);
    }

    // a changer
    /**
     * Obtenir le dernier numéro de produit à partir de la marque
     * @param int $brand_id
     */
    public function getLastPictureNumber(int $brand_id): int
    {
        $query = $this->pdo->prepare("SELECT MAX(picture_id) FROM {$this->table} WHERE brand_id=:brand_id");

        $query->bindValue(':brand_id', $brand_id, PDO::PARAM_INT);
        $query->execute();

        return ($query->fetch() ?? 0);
    }
}

    // /**
    //  * Trouver un produit à partir de son nom
    //  * @param string $name
    //  * @return array
    //  */
    // public function findByName(string $name): array
    // {
    //     $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE name=:name");

    //     $query->bindValue(':name', $name, PDO::PARAM_STR);
    //     $query->execute();
    //     $brand = $query->fetch();

    //     return $brand;   
    // }

    
   