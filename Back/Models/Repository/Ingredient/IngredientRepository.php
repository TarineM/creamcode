<?php

namespace Models\Repository\Ingredient;

use Models\Repository\Model;
use Models\Entity\Ingredient\Ingredient;

class IngredientRepository extends Model
{
    protected $table = "cosmetic_ingredient";

    public function insert(Ingredient $ingredient): void
    {
        $data['name'] = $ingredient->getName();
        $data['origin_id'] = $ingredient->getOrigin()->getId();
        $data['human_impact_id'] = $ingredient->getHumanImpact()->getId();
        $data['environment_impact_id'] = $ingredient->getEnvironmentImpact()->getId();
        $data['metadata'] = $ingredient->getMetadata();

        $this->insertInDatabase($data);
    }

    public function getObject(array $dataFetch): Ingredient
    {  
        $origin = (new IngredientOriginRepository())->find($dataFetch['origin_id']);
        $humanImpact = (new IngredientImpactRepository())->find($dataFetch['human_impact_id']);
        $environmentImpact = (new IngredientImpactRepository())->find($dataFetch['environment_impact_id']);
        
        $dataFetch['origin'] = (new IngredientOriginRepository())->getObject($origin);
        $dataFetch['human_impact'] = (new IngredientImpactRepository())->getObject($humanImpact);
        $dataFetch['environment_impact'] = (new IngredientImpactRepository())->getObject($environmentImpact);

        return new Ingredient($dataFetch);
    }
}