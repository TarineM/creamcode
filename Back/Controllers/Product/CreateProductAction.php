<?php

namespace Controllers\Product;

use Controllers\Controller;
use Models\Entity\Product\Product;
use Models\Entity\Product\Composition;
use Models\Repository\Brand\BrandRepository;
use Models\Entity\Brand\Brand;
use Models\Entity\Product\Type;
use Models\Repository\Product\ProductRepository;
use Models\Repository\Product\TypeRepository;
use FileSystem\Image;
use Controllers\Brand\GetBrandsAction;
use Controllers\Label\GetLabelsAction;

class CreateProductAction extends Controller
{
    protected $repositoryName = ProductRepository::class;

    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            $this->renderFormProduct();
        }

        else {
            $input['name'] = $_POST['name'] !== "" ? $_POST['name'] : null;
            $input['brand_id'] = $_POST['brand_id'] !== "" ? $_POST['brand_id'] : null;
            $input['type_id'] = $_POST['type_id'] !== "" ? $_POST['type_id'] : null;
            $input['composition'] = $_POST['composition'] !== "" ? $_POST['composition'] : null;
            $input['composition'] = explode(", ", $input['composition']);
    
            $securityExpr = new \Security\ValidationExpr();
            $createCompositionAction = new CreateCompositionAction();
            
            $validation['name'] = $securityExpr->isStringValid($input['name'], $securityExpr::REGEX_LEVEL_FIVE);
            $validation['brand_id'] = ctype_digit($input['brand_id']);
            $validation['type_id'] = ctype_digit($input['type_id']);
            $validation['composition'] = $createCompositionAction->validationInput($input['composition']);
            
            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli ! 1");
            }

            $addCertificationsAction = new AddCertificationsAction();
            $input['certifications'] = $_POST['certifications'] ?? null;
    
            $inputExtern['brand'] = (new BrandRepository())->find($input['brand_id']);
            $inputExtern['type'] = (new TypeRepository())->find($input['type_id']);
            $inputExtern['ingredientsWithPositions'] = $createCompositionAction->generateComposition($input['composition']);
            $inputExtern['ingredientsWithPositions'] = Composition::sortComposition($inputExtern['ingredientsWithPositions']);

            if (null !== $input['certifications']) {
                $inputExtern['labels'] = $addCertificationsAction->generateCertifications($input['certifications']);
            }
    
            if (in_array(false, $inputExtern)) {
                echo '<pre>'; print_r($inputExtern); echo '</pre>';
                die("Votre formulaire a été mal rempli ! 3");
            }

            $pictureData['id']  = ($this->repository->getLastPictureNumber($input['brand_id']));
            $pictureData['id'] = $pictureData['id'] + 1;
    
            $data['name'] = $input['name'];
            $data['brand'] = (new BrandRepository())->getObject($inputExtern['brand']);
            $data['type'] = (new TypeRepository())->getObject($inputExtern['type']);
            $data['picture'] = new Image($pictureData);
            $data['composition'] = new Composition($inputExtern['ingredientsWithPositions']);
            $data['certifications'] = $inputExtern['labels'] ?? null;
     
            $product = new Product($data);
            $this->repository->insert($product);

            $target_dir = "../Assets/IMG/brands/" . ($data['brand'])->getFolder()->getName() . "/";  // reference to index.php (admin or client)

            $target_file = $target_dir . $pictureData['id'] . '.png';

            move_uploaded_file($_FILES["product_picture"]["tmp_name"], $target_file);

            $dataAction['product_id'] = ($this->repository->getPdo())->lastInsertId();
            $dataAction['composition'] = $_POST['composition'];
            
            $createCompositionAction->addInProduct($dataAction);
            if (isset($_POST['certifications'])) {
                $dataAction['certifications'] = $_POST['certifications'];
                $addCertificationsAction->addInProduct($dataAction);
            }

            $redirection = sprintf("index.php?controller=%s&action=%s&id=%s", "product", "getProduct", $dataAction['product_id']);
            \Http::redirect($redirection);
        }
    }

    public function renderFormProduct()
    {
        $brandsPresenter = (new GetBrandsAction())->getAllData();
        $typesPresenter = (new GetTypesAction())->getAllData();
        $labelsPresenter = (new GetLabelsAction())->getAllData();
        $pageTitle = 'Ajouter un produit';

        \Renderer::render('Product/create_product', compact('pageTitle', 'brandsPresenter', 'typesPresenter', 'labelsPresenter'));
    }
}