<?php

namespace Controllers\Ingredient;

use Models\Repository\Ingredient\IngredientRepository;
use Models\Repository\Ingredient\IngredientImpactRepository;
use Models\Repository\Ingredient\IngredientOriginRepository;
use Models\Entity\Ingredient\Ingredient;
use Models\Entity\Ingredient\IngredientImpact;
use Models\Entity\Ingredient\IngredientOrigin;
use Controllers\Controller;

class CreateIngredientAction extends Controller
{
    protected $repositoryName = IngredientRepository::class;

    public function __invoke()
    {
        if(isset($_GET['task']) && $_GET['task'] === 'form') {
            $this->renderFormIngredient();
        }

        else {
            $input['name'] = $_POST['name'] !== "" ? $_POST['name'] : null;
            $input['origin_id'] = $_POST['origin_id'] !== "" ? $_POST['origin_id'] : null;
            $input['human_impact_id'] = $_POST['human_impact_id'] !== "" ? $_POST['human_impact_id'] : null;
            $input['environment_impact_id'] = $_POST['environment_impact_id'] !== "" ? $_POST['environment_impact_id'] : null;

            $securityExpr = new \Security\ValidationExpr();

            $validation['name'] = $securityExpr->isStringValid($input['name'], $securityExpr::REGEX_LEVEL_FIVE);
            $validation['origin_id'] =  ctype_digit($input['origin_id']);
            $validation['human_impact_id'] =  ctype_digit($input['human_impact_id']);
            $validation['environment_impact_id'] =  ctype_digit($input['environment_impact_id']);

            if (in_array(null, $input) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli ! 1");
            }

            $input['metadata'] = $_POST['metadata'] !== "" ? $_POST['metadata'] : null;

            if (null !== $input['metadata']) {
                $validation['metadata'] = $securityExpr->isStringValid($input['metadata'], $securityExpr::REGEX_LEVEL_ONE);
            }
            
            $inputExtern['origin'] = (new IngredientOriginRepository())->find($input['origin_id']);
            $inputExtern['human_impact'] = (new IngredientImpactRepository())->find($input['human_impact_id']);
            $inputExtern['environment_impact'] = (new IngredientImpactRepository())->find($input['environment_impact_id']);
            //echo '<pre>'; print_r($input); echo '</pre>';
        
            if (in_array(false, $inputExtern) || in_array(false, $validation)) {
                die("Votre formulaire a été mal rempli 2");
            }  
    
            $data['name'] = $input['name'];
            $data['origin'] = (new IngredientOriginRepository())->getObject($inputExtern['origin']);
            $data['human_impact'] = (new IngredientImpactRepository())->getObject($inputExtern['human_impact']);
            $data['environment_impact'] = (new IngredientImpactRepository())->getObject($inputExtern['environment_impact']);
            $data['metadata'] = $input['metadata'];
    
            $ingredient = new Ingredient($data);
    
            $this->repository->insert($ingredient);
    
            \Http::redirect("index.php?controller=ingredient&action=getIngredients");
        }
    }

    public function renderFormIngredient()
    {
        $originsPresenter = (new GetIngredientOriginsAction())->getAllData();
        $impactsPresenter = (new GetIngredientImpactsAction())->getAllData();
        $pageTitle = 'Ajouter un ingrédient';

        \Renderer::render('Ingredient/create_ingredient', compact('pageTitle', 'impactsPresenter', 'originsPresenter'));
    }
}