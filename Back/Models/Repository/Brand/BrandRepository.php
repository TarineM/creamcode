<?php

namespace Models\Repository\Brand;

use Models\Repository\Model;
use Models\Entity\Brand\Brand;

class BrandRepository extends Model
{
    protected $table = "cosmetic_brand";

    public function insert(Brand $brand): void
    {
        $data['name'] = $brand->getName();
        $data['folder_name'] = $brand->getFolder()->getName();
        $data['picture_name'] = $brand->getPicture()->getName();

        $this->insertInDatabase($data);
    }
}
