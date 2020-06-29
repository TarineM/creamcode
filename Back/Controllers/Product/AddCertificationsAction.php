<?php

namespace Controllers\Product;

use Controllers\Controller;
use Models\Entity\Product\Product;
use Models\Entity\Label\Label;
use Models\Repository\Product\ProductCertificationRepository;
use Models\Repository\Product\ProductRepository;
use Models\Repository\Label\LabelRepository;

class AddCertificationsAction extends Controller
{
    protected $repositoryName = ProductCertificationRepository::class;

    public function addInProduct(array $dataActions)
    {
        $input['certifications'] = $dataActions['certifications'] ?? null;
        $input['product_id'] = $dataActions['product_id'] ?? null;

        $validation['certifications'] = $this->validationInput($input['certifications']);
        $validation['product_id'] = ctype_digit($input['product_id']);

        if (in_array(null, $input) || in_array(false, $validation)) {
            die("Votre formulaire a été mal rempli ! Input Certifications");
        }

        $inputExtern['ingredients'] = $this->generateCertifications($input['certifications']);
        $inputExtern['product'] = (new ProductRepository())->find($input['product_id']);

        if (in_array(false, $inputExtern)) {
            die("Votre formulaire de certifications a été mal rempli ! extern certifications");
        }

        $product = (new ProductRepository())->getObject($inputExtern['product']);
        $product->setCertifications($inputExtern['ingredients']);

        $this->repository->insert($product);
    }

    public function validationInput(array $certifications): bool
    {
        foreach($certifications as $labelId)
        {
            if (false === ctype_digit($labelId)) {
                return false;
            } 
        }
        return true;
    }

    public function generateCertifications(array $certifications)
    {
        $newCertifications = [];

        foreach($certifications as $labelId) {
            $labelData = (new LabelRepository())->find($labelId);

            if (false === $labelData) {
                return false;
            }

            $newCertifications[] = (new LabelRepository())->getObject($labelData);
        }

        return $newCertifications;
    }
}