<?php

namespace Models\Repository\Label;

use Models\Repository\Model;
use Models\Entity\Label\Label;

class LabelRepository extends Model
{
    protected $table = "cosmetic_label";

    public function insert(Label $label)
    {
        $data['name'] = $label->getName();
        $data['picture_id'] = $label->getPicture()->getId();

        $this->insertInDatabase($data);
    }
}