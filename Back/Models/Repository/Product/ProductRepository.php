<?php

namespace Models\Repository\Product;

use Models\Repository\Model;
use Models\Entity\Product\Product;
use Models\Entity\Product\Type;
use Models\Entity\Brand\Brand;
use Models\Repository\Brand\BrandRepository;
use FileSystem\Image;
use PDO;

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

    /**
     * Obtenir le dernier numéro de produit à partir de la marque
     * @param int $brand_id
     */
    public function getLastPictureNumber(int $brand_id): int
    {
        $sql = sprintf("SELECT MAX(picture_id) as last_picture_id FROM %s WHERE brand_id=:brand_id", $this->table);
        $query = $this->pdo->prepare($sql);

        $query->bindValue(':brand_id', $brand_id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();
        return ($result['last_picture_id'] !== NULL ? $result['last_picture_id'] : 0);
    }

    public function setAlternative(int $product_id): void
    {
        $sql = sprintf("UPDATE %s SET has_alternative = true WHERE id=:id", $this->table);
        $query = $this->pdo->prepare($sql);

        $query->bindValue(':id', $product_id, PDO::PARAM_INT);
        $query->execute();
    }

    public function getObject(array $dataFetch): Product
    {   
        $brand = (new BrandRepository())->find($dataFetch['brand_id']);
        $type = (new TypeRepository())->find($dataFetch['type_id']);
        $picture['id'] = $dataFetch['picture_id'];
        $composition = (new CompositionRepository())->find($dataFetch['id']);
        $certifications = (new ProductCertificationRepository())->find($dataFetch['id']);
        
        $dataFetch['brand'] = (new BrandRepository())->getObject($brand);
        $dataFetch['type'] = (new TypeRepository())->getObject($type);
        $dataFetch['picture'] = new Image($picture);
        $dataFetch['composition'] = (new CompositionRepository())->getObject($composition);
        $dataFetch['certifications'] = (new ProductCertificationRepository())->getObject($certifications);

        return new Product($dataFetch);
    }
}


    
   