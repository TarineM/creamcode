<?php

namespace Controllers\Brand;

use Models\Repository\Brand\BrandRepository;
use FileSystem\Folder;
use FileSystem\Image;
use Models\Entity\Brand\Brand;
use Controllers\Controller;

class GetBrandsAction extends Controller
{
    protected $repositoryName = BrandRepository::class;

    public function __invoke()
    {   
        $brandsPresenter = $this->getAllData();
        $pageTitle = 'Toutes les marques';
        
        \Renderer::render('Brand/get_brands', compact('pageTitle', 'brandsPresenter'));
    }

    public function getAllData()
    {
        $brands = $this->repository->findAll();

        $brandsPresenter = [];

        foreach($brands as $brandData) {
            $folderData['name'] = $brandData['folder_name'];
            $pictureData['name'] = $brandData['picture_name'];

            $brandData['folder'] = new Folder($folderData);
            $brandData['picture'] = new Image($pictureData);

            $brandsPresenter[] = new Brand($brandData);
        }

        return $brandsPresenter;
    }
}