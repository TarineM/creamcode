<?php

namespace Models\Repository\Label;

use Models\Repository\Model;
use Models\Entity\Label\Label;
use FileSystem\Image;

class LabelRepository extends Model
{
    protected $table = "cosmetic_label";

    public function insert(Label $label)
    {
        $data['name'] = $label->getName();
        $data['picture_name'] = $label->getPicture()->getName();

        $this->insertInDatabase($data);
    }

    public function getObject(array $dataFetch): Label
    {
        $dataPicture['name'] = $dataFetch['picture_name'];
        $dataFetch['picture'] = new Image($dataPicture);
        
        return new Label($dataFetch);
    }
}