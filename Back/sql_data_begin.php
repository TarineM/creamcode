<?php

$brand = [
    ['Avril', 'avril', 'avril'],
    ['Sanoflore', 'sanoflore', 'sanoflore'],
    ['Nivea', 'nivea', 'nivea'],
    ['Head and Shoulders', 'head_and_shoulders', 'head_and_shoulders'],
    ['Mademoiselle Bio', 'mademoiselle_bio', 'mademoiselle_bio'],
    ['Garnier', 'garnier', 'garnier'],
    ['Marilou bio', 'marilou_bio', 'marilou_bio'],
    ['Weleda', 'weleda', 'weleda'],
];

$labels = [
    ['AB', 'ab'],
    ['BDIH', 'bdih'],
    ['Cosmebio', 'cosmebio'],
    ['Cruelty Free', 'cruelty_free'],
    ['Cruelty Free and Vegan', 'cruelty_free_and_vegan'],
    ['Ecocert', 'ecocert'],
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
    ['Bon', '00e64d'],
    ['Neutre', 'c2c2a3'],
    ['Allergène', 'ffff66'],
    ['À éviter', 'ffad33'],
    ['Danger', 'ff1a1a'],
    ['Inconnu', 'ffffff'],
];

$origins = [
    'végétal',
    'animal',
    'minéral',
    'marine',
    'synthétique',
    'inconnu',
    'diverse',
];

/*foreach($brand as $b) {
    $colle = "'" . implode("', '", $b) . "'";
    echo "<p>INSERT INTO cosmetic_brand (name, folder_name, picture_name) 
    VALUES ({$colle});</p>";
}

foreach($labels as $lab) {
    $colle = "'" . implode("', '", $lab) . "'";
    echo "<p>INSERT INTO cosmetic_label (name, picture_name) 
    VALUES ({$colle});</p>";
}

foreach($types as $typ) {
    $colle = "'" . $typ . "'";
    echo "<p>INSERT INTO cosmetic_type (name) 
    VALUES ({$colle});</p>";
}

foreach($impacts as $imp) {
    $colle = "'" . implode("', '", $imp) . "'";
    echo "<p>INSERT INTO ingredient_impact (impact_level, color) 
    VALUES ({$colle});</p>";
}*/

foreach($origins as $org) {
    $colle = "'" . $org . "'";
    echo "<p>INSERT INTO ingredient_origin (name) 
    VALUES ({$colle});</p>";
}

