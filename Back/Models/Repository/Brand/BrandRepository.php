<?php

namespace Models\Repository\Brand;

use Models\Repository\Model;
use Models\Entity\Brand\Brand;
use FileSystem\Folder;
use FileSystem\Image;

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

    public function getObject(array $dataFetch): Brand
    {
        $dataFolder['name'] = $dataFetch['folder_name'];
        $dataPicture['name'] = $dataFetch['picture_name'];
        $dataFetch['folder'] = new Folder($dataFolder);
        $dataFetch['picture'] = new Image($dataPicture);
        
        return new Brand($dataFetch);
    }
}
