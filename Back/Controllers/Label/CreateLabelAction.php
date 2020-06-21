<?php

namespace Controllers\Label;

use Models\Repository\Label\LabelRepository;
use Models\Entity\Label\Label;
use Controllers\Controller;
use FileSystem\Image;

class CreateLabelAction extends Controller
{
    protected $repositoryName = LabelRepository::class;

    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            $pageTitle = 'Ajouter un label';

            \Renderer::render('Label/create_label', compact('pageTitle'));
        }

        else {
            $input = [];
            $validation = [];
            
            $input['name'] = $_POST['name'] ?? null;
            $input['picture_name'] = $_POST['picture_name'] ?? null;
    
            $securityExpr = new \Security\ValidationExpr();
            $validation['name'] = $securityExpr->isStringValid($input['name']);
            $validation['picture_name'] = $securityExpr->isStringValid($input['picture_name']);
    
            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli !");
            }
            
            $pictureData['name'] = $input['picture_name'];
    
            $data['name'] = $input['name'];
            $data['picture'] = new Image($pictureData);
    
            $label = new Label($data);
    
            $pageTitle = 'Tous les labels';
    
            $this->repository->insert($label);
    
            \Http::redirect('index.php?controller=label&action=getLabels');
        }
    }
}