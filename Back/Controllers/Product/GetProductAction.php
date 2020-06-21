<?php

namespace Controllers\Product;

use Controllers\Controller;
use Models\Entity\Product\Product;
use Models\Repository\Brand\BrandRepository;
use Models\Entity\Brand\Brand;
use Models\Repository\Product\ProductRepository;
use Models\Repository\Product\TypeRepository;
use Models\Entity\Product\Type;
use FileSystem\Image;

class GetProductAction extends Controller
{
    public function __invoke()
    {
        $input['id'] = $_GET['id'] ?? null;

        $validation['id'] = ctype_digit($input['id']);

        if (in_array(null, $input) || in_array(false, $validation)) {
            die("Produit non valide !");
        }

        $dataProduct = $this->model->find($input['id']);

        if (!$dataProduct) {
            die("Produit non existant !");
        }

        // if has alternative
        // boucle

        $brand = (new BrandRepository())->find($dataProduct['brand_id']);
        // attention brand avec folder tout ça
        $type = (new TypeRepository())->find($dataProduct['type_id']);
        $pictureData['id'] = $dataProduct['picture_id'];

        $dataProduct['brand'] = new Brand($brand);
        $dataProduct['picture'] = new Image($pictureData);
        $dataProduct['type'] = new Type($type);

        //$dataProduct['composition'] = new Composition($dataProduct['composition'])

        // alternativeif ()

        $product = new Product($dataProduct);

        // redirect
    }
}