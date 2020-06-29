<?php

namespace Controllers\Product;

use Controllers\Controller;
use Models\Entity\Product\Product;
use Models\Repository\Brand\BrandRepository;
use Models\Entity\Brand\Brand;
use Models\Repository\Product\ProductRepository;
use Models\Repository\Product\AlternativeProductRepository;
use Models\Repository\Product\TypeRepository;
use Models\Entity\Product\Type;
use FileSystem\Image;

class GetProductAction extends Controller
{
    protected $repositoryName = ProductRepository::class;

    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            $pageTitle = "Rechercher un produit";
            \Renderer::render('Product/search/search_product', compact('pageTitle'));
        }

        else {
            $input['id'] = $_GET['id'] ?? null;

            $validation['id'] = ctype_digit($input['id']);

            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Produit non valide !");
            }

            $dataProduct = $this->repository->find($input['id']);

            if (false == $dataProduct) {
                die("Produit non existant !");
            }

            $product = $this->repository->getObject($dataProduct);
            $alternatives = $this->getAllAlternatives($product);
            $pageTitle = "Produit";

            \Renderer::render('Product/get_product', compact('pageTitle', 'product', 'alternatives'));
        }
    }

    public function getAllAlternatives(Product $product)
    {
        $alternatives = (new AlternativeProductRepository)->findAlternatives($product);

        $alternativesPresenter = [];

        foreach($alternatives as $alternative) {
            $data['alternative'] = $this->repository->find($alternative['alternative_id']);
            $alternativesPresenter[] = $this->repository->getObject($data['alternative']);
        }

        return $alternativesPresenter;
    }
}