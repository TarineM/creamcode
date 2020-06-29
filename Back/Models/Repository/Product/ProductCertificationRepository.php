<?php

namespace Models\Repository\Product;

use Models\Repository\Model;
use Models\Repository\Label\LabelRepository;
use Models\Entity\Product\Product;
use PDO;

class ProductCertificationRepository extends Model
{
    protected $table = "product_certification";

    public function insert(Product $product)
    {
        $data['product_id'] = $product->getId();

        foreach ($product->getCertifications() as $certification) {
            $data['label_id'] = $certification->getId();

            $this->insertInDatabase($data);
        }
    }

    public function find(int $product_id)
    {
        $sql = sprintf("SELECT * FROM %s WHERE product_id=:product_id", $this->table);
        $query = $this->pdo->prepare($sql);

        $query->bindValue(':product_id', $product_id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    public function getObject($dataFetch): array
    {
        $newCertifications = [];

        foreach($dataFetch as $data) {
            $labelData = (new LabelRepository())->find($data['label_id']);

            if (false === $labelData) {
                return false;
            }

            $newCertifications[] = (new LabelRepository())->getObject($labelData);
        }

        return $newCertifications;
    }
}