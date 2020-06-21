<?php

namespace Controllers\Label;

use Models\Repository\Label\LabelRepository;
use FileSystem\Image;
use Models\Entity\Label\Label;
use Controllers\Controller;

class GetLabelsAction extends Controller
{
    protected $repositoryName = LabelRepository::class;

    public function __invoke()
    {   
        $labelsPresenter = $this->getAllData();

        $pageTitle = 'Tous les labels';
        
        \Renderer::render('Label/get_labels', compact('pageTitle', 'labelsPresenter'));
    }

    public function getAllData()
    {
        $labels = $this->repository->findAll();

        $labelsPresenter = [];

        foreach($labels as $labelData) {
            $pictureData['name'] = $labelData['picture_name'];

            $labelData['picture'] = new Image($pictureData);

            $labelsPresenter[] = new Label($labelData);
        }

        return $labelsPresenter;
    }
}