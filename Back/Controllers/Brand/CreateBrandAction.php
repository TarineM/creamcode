<?php

namespace Controllers\Brand;

use FileSystem\Folder;
use FileSystem\Image;
use Models\Repository\Brand\BrandRepository;
use Models\Entity\Brand\Brand;
use Controllers\Controller;

class CreateBrandAction extends Controller
{
    protected $repositoryName = BrandRepository::class;

    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            $pageTitle = 'Ajouter une marque';
            \Renderer::render('Brand/create_brand', compact('pageTitle'));
        }

        else {
            $input['name'] = $_POST['name'] !== "" ? $_POST['name'] : null;
            $input['folder_name'] = $_POST['folder_name'] !== "" ? $_POST['folder_name'] : null;
            $input['picture_name'] = "logo-brand";

            $securityExpr = new \Security\ValidationExpr();
            
            $validation['name'] = $securityExpr->isStringValid($input['name'], $securityExpr::REGEX_LEVEL_FIVE);
            $validation['folder_name'] = $securityExpr->isStringValid($input['folder_name'], $securityExpr::REGEX_LEVEL_FIVE);
            $validation['picture_name'] = $securityExpr->isStringValid($input['picture_name'], $securityExpr::REGEX_LEVEL_FIVE);

            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli !");
            }

            $folderData['name'] = $input['folder_name'];
            $pictureData['name'] = $input['picture_name'];

            $data['name'] = $input['name'];
            $data['folder'] = new Folder($folderData);
            $data['picture'] = new Image($pictureData);

            $brand = new Brand($data);

            $this->repository->insert($brand);

            $target_dir = "../Assets/IMG/brands/";  // reference to index.php (admin or client)
            $old = umask(0); 
            mkdir($target_dir . $input['folder_name'], 0777); 
            umask($old); 

            $target_file = $target_dir . $input['folder_name'] . "/logo-brand.png";

            move_uploaded_file($_FILES["brand_picture"]["tmp_name"], $target_file);

            \Http::redirect("index.php?controller=brand&action=getBrands");
        }
    }
}