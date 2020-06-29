<?php

namespace Controllers\Product;

use Models\Repository\Product\TypeRepository;
use FileSystem\Folder;
use FileSystem\Image;
use Models\Entity\Product\Type;
use Controllers\Controller;

class GetTypesAction extends Controller
{
    protected $repositoryName = TypeRepository::class;

    public function __invoke()
    {   
        $typesPresenter = $this->getAllData();
        $pageTitle = 'Tous les types de cosmétique';
        
        \Renderer::render('Type/get_types', compact('pageTitle', 'typesPresenter'));
    }

    public function getAllData()
    {
        $types = $this->repository->findAll();

        $typesPresenter = [];

        foreach($types as $typeData) {
            $typesPresenter[] = new Type($typeData);
        }

        return $typesPresenter;
    }
}