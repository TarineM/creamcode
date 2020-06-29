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
            $pageTitle = 'Ajouter un type de produit';
            
            \Renderer::render('Product/create_type', compact('pageTitle'));
        }

        else {
            $input['name'] = $_POST['name'] !== "" ? $_POST['name'] : null;

            $securityExpr = new \Security\ValidationExpr();
            
            $validation['name'] = $securityExpr->isStringValid($input['name'], $securityExpr::REGEX_LEVEL_FIVE);
    
            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli !");
            }
    
            $data['name'] = $input['name'];
    
            $type = new Type($data);
    
            $this->repository->insert($type);
    
            \Http::redirect('index.php?controller=product&action=getTypes');
        }
    }
}