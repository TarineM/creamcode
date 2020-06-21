<?php

namespace Controllers\Ingredient;

use Models\Repository\Ingredient\IngredientOriginRepository;
use Models\Entity\Ingredient\IngredientOrigin;
use Controllers\Controller;

class CreateIngredientOriginAction extends Controller
{
    protected $repositoryName = IngredientOriginRepository::class;

    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            $pageTitle = 'Ajouter une origine d\'ingrédient';
            
            \Renderer::render('Ingredient/create_ingredient_origin', compact('pageTitle'));
        }

        else {
            $input['name'] = $_POST['name'] ?? null;

            $securityExpr = new \Security\ValidationExpr();
            $validation['name'] = $securityExpr->isStringValid($input['name']);

            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli !");
            }

            $data['name'] = $input['name'];

            $ingredientOrigin = new IngredientOrigin($data);

            $pageTitle = 'Toutes les origines d\'ingrédients';

            $this->repository->insert($ingredientOrigin);

            \Http::redirect("index.php?controller=ingredient&action=getIngredientOrigins");
        }
    }
}