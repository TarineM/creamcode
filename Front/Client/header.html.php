<?php require_once('const.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?= $pageTitle ?></title>
        <link rel="icon" href=<?= $logoPath ?> >
        <link href="design.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <h1>
                <a href="index.html.php">
                    <img id="logo-image" alt="Cream Code" src=<?= $logoPath ?> >
                </a>
            </h1>
            <ul id="menu">
                <li><a href="../Shared/Product/search.html.php">Rechercher un produit</a></li>
                <li><a href="../Shared/blog_cosmetic.html.php">Documentation cosmétique</a></li>
                <li><a href="../Shared/about_us.html.php">À propos</a></li>
            </ul>
        </header>