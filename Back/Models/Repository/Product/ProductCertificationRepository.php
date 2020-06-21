<?php

namespace Models\Repository\Product;

use Models\Repository\Model;
use Models\Entity\Product\Product;

class ProductCertificationRepository extends Model
{
    protected $table = "product_certification";

    public function insert(Product $product)
    {
        $data['product_id'] = $product->getId();

        foreach ($product->getCertifications() as $certification) {
            $data['certification_id'] = $certification->getId();

            $this->insertInDatabase($data);
        }
    }
}