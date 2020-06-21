<?php

namespace Controllers\Type;

use Models\Repository\Produit\TypeRepository;
use Models\Entity\Produit\Type;
use Controllers\Controller;

class CreateTypeAction extends Controller
{
    protected $repositoryName = TypeRepository::class;

    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            $pageTitle = 'Ajouter une origine d\'ingrédient';
            
            //redirect vers formulaire création brand
        }

        else {
            $input['name'] = $_POST['name'] ?? null;

            $securityExpr = new \Security\ValidationExpr();
            $validation['name'] = $securityExpr->isStringValid($input['name']);
    
            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli !");
            }
    
            $data['name'] = $input['name'];
    
            $type = new Type($data);
    
            $pageTitle = 'Toutes les types';
    
            $this->repository->insert($type);
    
            //redirect vers formulaire création origine d'ingrédient
        }
    }
}