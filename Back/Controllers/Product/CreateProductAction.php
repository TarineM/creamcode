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

class CreateProductAction extends Controller
{
    protected $repositoryName = ProductRepository::class;

    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            //redirect vers formulaire ingredient
            $pageTitle = 'Ajouter un produit';
        }

        else {
            $input['name'] = $_POST['name'] ?? null;
            $input['brand_id'] = $_POST['brand_id'] ?? null;
            $input['type_id'] = $_POST['type_id'] ?? null;
    
            $securityExpr = new \Security\ValidationExpr();
            $validation['name'] = $securityExpr->isStringValid($input['name']);
            $validation['brand_id'] = $securityExpr->isStringValid($input['brand_id']);
            $validation['type_id'] = $securityExpr->isStringValid($input['type_id']);
    
            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli !");
            }
    
            $inputExtern['brand'] = (new BrandRepository())->find($input['brand_id']);
            $inputExtern['type'] = (new TypeRepository())->find($input['type_id']);
    
            // S'il y a au moins une option qui est rempli mais non valide ou non existant
            if (in_array(false, $inputExtern)) {
                die("Votre formulaire a été mal rempli");
            }
    
            $pictureData['id']  = ($this->model->getLastPictureNumber($input['brand_id'])) + 1;
    
            $data['name'] = $input['name'];
            $data['brand'] = $inputExtern['brand'];
            $data['type'] = $inputExtern['type'];
            $data['picture'] = new Image($pictureData);
    
            $product = new Product($data);
    
            $this->repository->insert($product);
    
            // redirect liste produit
        }
    }
}