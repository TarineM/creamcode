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
            $input['name'] = $_POST['name'] ?? null;
            $input['folder_name'] = $_POST['folder_name'] ?? null;
            $input['picture_name'] = $input['folder_name'];

            $securityExpr = new \Security\ValidationExpr();
            $validation['name'] = $securityExpr->isStringValid($input['name']);
            $validation['folder_name'] = $securityExpr->isStringValid($input['folder_name']);
            $validation['picture_name'] = $securityExpr->isStringValid($input['picture_name']);

            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli !");
            }

            $folderData['name'] = $input['folder_name'];
            $pictureData['name'] = $input['picture_name'];

            $data['name'] = $input['name'];
            $data['folder'] = new Folder($folderData);
            $data['picture'] = new Image($pictureData);

            $brand = new Brand($data);

            $pageTitle = 'Toutes les marques';

            $this->repository->insert($brand);

            \Http::redirect("index.php?controller=brand&action=getBrands");
        }
    }
}