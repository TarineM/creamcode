<?php

namespace Models\Repository\Product;

use Models\Repository\Model;
use Models\Entity\Product\Type;

class TypeRepository extends Model
{
    protected $table = "cosmetic_type";

    /**
     * Insert in the BDD new data/row on a table
     * @param string $name
     * @return void
     */
    public function insert(Type $type): void
    {
        $data['name'] = $type->getName();
        
        $this->insertInDatabase($data);
    }
}