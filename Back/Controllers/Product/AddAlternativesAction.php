<?php

namespace Controllers\Product;

use Controllers\Controller;
use Models\Entity\Product\Product;
use Models\Repository\Product\ProductRepository;
use Models\Repository\Product\AlternativeProductRepository;

class AddAlternativesAction extends Controller
{
    protected $repositoryName = AlternativeProductRepository::class;

    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            $pageTitle = "Ajout Alternatives";
            \Renderer::render('Product/add_alternatives', compact('pageTitle'));
        }
        else {
            $input['original_id'] = $_POST['original_id'] !== "" ? $_POST['original_id'] : null;
            $input['alternatives_id'] = $_POST['alternatives_id'] !== "" ? $_POST['alternatives_id'] : null;
            
            $alternativeRepository = new AlternativeProductRepository();

            $data['product'] = (new ProductRepository())->find($input['original_id']);
            $originalProduct = (new ProductRepository())->getObject($data['product']);

            foreach($input['alternatives_id'] as $alternative_id) {
                $data['alternative_product'] = (new ProductRepository())->find($alternative_id);
                $alternativeProduct = (new ProductRepository())->getObject($data['alternative_product']);
                $alternativeRepository->insert($originalProduct, $alternativeProduct);
            }
            (new ProductRepository())->setAlternative($originalProduct->getId());
            
            $redirection = sprintf("index.php?controller=%s&action=%s&id=%s", "product", "getProduct", $originalProduct->getId());
            \Http::redirect($redirection);
        }
        
    }
}