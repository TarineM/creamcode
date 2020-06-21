<?php

namespace Controllers;

class Type extends Controller
{
    protected $repositoryName = \Models\Type::class;

    /**
     * Ajouter un type de cosmétique
     */
    public function add()
    {
        $input = [];
        $validation = [];

        $input['name'] = $_POST['name'] ?? null;

        $securityExpr = new \Security\ValidationExpr();
        $validation['name'] = $securityExpr->isStringValid($input['name']);

        if (!$input['name'] || in_array(false, $validation)) {
            die("Votre formulaire a été mal rempli !");
        }

        $this->model->insert($input['name']);

        //redirect vers formulaire création type de produit
    }
}