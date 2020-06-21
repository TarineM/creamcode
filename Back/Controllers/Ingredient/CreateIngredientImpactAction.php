<?php

namespace Controllers\Ingredient;

use Controllers\Controller;
use Models\Repository\Ingredient\IngredientImpactRepository;
use Models\Entity\Ingredient\IngredientImpact;

class CreateIngredientImpactAction extends Controller
{
    protected $repositoryName = IngredientImpactRepository::class;

    /**
     * Ajouter un type d'imapct d'ingrédient
     */
    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            $pageTitle = 'Ajouter un impact d\'ingrédient';
            \Renderer::render('Ingredient/create_ingredient_impact', compact('pageTitle'));
        }

        else {
            $input['impact_level'] = $_POST['impact_level'] ?? null;
            $input['color'] = $_POST['color'] ?? null;
            $input['color'] = preg_replace('/#/', '', $input['color']);
    
            $securityExpr = new \Security\ValidationExpr();
            $validation['impact_level'] = $securityExpr->isStringValid($input['impact_level']);
            $validation['color'] = $securityExpr->isStringValid($input['color']);
    
            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli !");
            }
    
            $data['impact_level'] = $input['impact_level'];
            $data['color'] = $input['color'];
    
            $ingredientImpact = new IngredientImpact($data);
    
            $this->repository->insert($ingredientImpact);
    
            $pageTitle = 'Tous les impacts d\'ingrédients';
    
            \Http::redirect("index.php?controller=ingredient&action=getIngredientImpacts");
        }
    }
}