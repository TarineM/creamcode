<?php

namespace Controllers\Product;

use Controllers\Controller;
use Models\Entity\Product\Product;
use Models\Entity\Product\Composition;
use Models\Entity\Ingredient\Ingredient;
use Models\Entity\Ingredient\IngredientOrigin;
use Models\Entity\Ingredient\IngredientImpact;
use Models\Repository\Product\CompositionRepository;
use Models\Repository\Product\ProductRepository;
use Models\Repository\Ingredient\IngredientRepository;
use Models\Repository\Ingredient\IngredientOriginRepository;
use Models\Repository\Ingredient\IngredientImpactRepository;

class CreateCompositionAction extends Controller
{
    protected $repositoryName = CompositionRepository::class;

    public function addInProduct(array $dataActions)
    {
        $input['composition'] = $dataActions['composition'] ?? null;
        $input['product_id'] = $dataActions['product_id'] ?? null;
        $input['composition'] = explode(", ", $input['composition']);

        $validation['composition'] = $this->validationInput($input['composition']);
        $validation['product_id'] = ctype_digit($input['product_id']);

        if (in_array(null, $input) || in_array(false, $validation)) {
            die("Votre formulaire a été mal rempli ! input composition");
        }
        
        $inputExtern['product'] = (new ProductRepository())->find($input['product_id']);
        $inputExtern['ingredients'] = $this->generateComposition($input['composition']);
        $inputExtern['ingredients'] = Composition::sortComposition($inputExtern['ingredients']);

        if (in_array(false, $inputExtern)) {
            die("Votre formulaire de composition a été mal rempli ! extern composition");
        }

        $data['composition'] = $inputExtern['ingredients'];
        $data['product'] = $inputExtern['product'];

        $composition = new Composition($data['composition']);
        $product = (new ProductRepository())->getObject($inputExtern['product']);

        $this->repository->insert($product, $composition);
    }

    public function validationInput(array $composition): bool
    {
        foreach($composition as $ingredientId)
        {
            if (false === ctype_digit($ingredientId)) {
                return false;
            } 
        }
        return true;
    }

    public function generateComposition(array $composition)
    {
        $newComposition = [];
        
        foreach($composition as $ingredientId) {
            $ingredientData = (new IngredientRepository())->find($ingredientId);

            if (false === $ingredientData) {
                return false;
            }
            $newComposition[] = (new IngredientRepository())->getObject($ingredientData);
        }

        return $newComposition;
    }
}