<?php

$brand = [
    ['Avril', 'avril', 'avril'],
    ['Nivea', 'nivea', 'nivea'],
    ['Head and Shoulders', 'head_and_shoulders', 'head_and_shoulders'],
    ['Mademoiselle Bio', 'mademoiselle_bio', 'mademoiselle_bio'],
    ['Garnier', 'garnier', 'garnier'],
];

$labels = [
    ['AB', 'ab'],
    ['BDIH', 'bdih'],
    ['Choose Cruelty Free', 'choose_cruelty_free'],
    ['Cosmebio', 'cosmebio'],
    ['Cruelty Free and Vegan', 'cruelty_free_and_vegan'],
    ['Ecocert', 'ecocert'],
    ['Leaping Bunny', 'leaping_bunny'],
    ['Made in France', 'made_in_france'],
    ['Natrue', 'natrue'],
    ['Nature et Progrès', 'nature_et_progres'],
    ['Slow Cosmétique', 'slow_cosmetique'],
    ['Vegan', 'vegan'],
];

$types = [
    'Nettoyant Visage',
    'Eau Micellaire',
    'Démaquillant',
    'Lotion Visage',
    'Savon',
    'Gel Douche',
    'Eau Florale',
    'Huile Végétale',
    'Huile Essentielle',
    'Gommage Visage',
    'Masque Visage',
    'Soin Lèvres',
    'Soin Visage',
    'Contour Des Yeux',
    'Soin Solaire',
    'Shampooing',
    'Après-Shampooing',
    'Gommage Cheveux',
    'Masque Cheveux',
    'Soin Capillaire',
    'Coloration',
    'Déodorant',
    'Soin dentaire',
];

$impacts = [
    ['bon', '00e64d'],
    ['neutre', 'c2c2a3'],
    ['allergène', 'ae80c0'],
    ['à éviter', 'ffad33'],
    ['danger', 'ff1a1a'],
    ['unconnu', 'ffffff'],
];

$origins = [
    'végétale',
    'animale',
    'minérale',
    'marine',
    'synthétique',
    'inconnue',
    'diverse',
];

foreach($brand as $b) {
    $colle = sprintf("'%s'", implode("', '", $b));
    echo "<p>INSERT INTO cosmetic_brand (name, folder_name, picture_name) 
    VALUES ({$colle});</p>";
}

foreach($labels as $lab) {
    $colle = sprintf("'%s'", implode("', '", $lab));
    echo "<p>INSERT INTO cosmetic_label (name, picture_name) 
    VALUES ({$colle});</p>";
}

foreach($types as $typ) {
    $colle = sprintf("'%s'", $typ);
    echo "<p>INSERT INTO cosmetic_type (name) 
    VALUES ({$colle});</p>";
}

foreach($impacts as $imp) {
    $colle = sprintf("'%s'", implode("', '", $imp));
    echo "<p>INSERT INTO ingredient_impact (impact_level, color) 
    VALUES ({$colle});</p>";
}

foreach($origins as $org) {
    $colle = sprintf("'%s'", $org);
    echo "<p>INSERT INTO ingredient_origin (name) 
    VALUES ({$colle});</p>";
}

