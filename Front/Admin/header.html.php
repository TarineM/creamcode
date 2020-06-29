<header>
    <!--
    <h1>
        <a href="index.php">
            <img id="logo-image" alt="Cream Code" src=<?php //$logoPath ?> >
        </a>
    </h1>
            
    <nav id="menu">
        <ul>
            <li class="schroll"><a href="#">Produits</a>
                <ul class="sub-list">
                    <li><a href="index.php?controller=product&action=createProduct&task=form">Ajouter un produit</a></li>
                    <li><a href="index.php?controller=product&action=createAlternatives&task=form">Ajouter une alternative cosmétique</a></li>
                    <li><a href="index.php?controller=product&action=getProduct&task=form">Rechercher un produit</a></li>
                </ul>           
            </li>

            <li class="schroll"><a href="#">Marques</a>
        <ul class="sub-list">
                    <li><a href="index.php?controller=brand&action=createBrand&task=form">Ajouter une marque</a></li>
                    <li><a href="index.php?controller=brand&action=getBrands">Toutes les marques</a></li>
                </ul>           
            </li>

            <li class="schroll"><a href="#">Ingrédients</a>
                <ul class="sub-list">
                    <li><a href="index.php?controller=ingredient&action=createIngredient&task=form">Ajouter un ingrédient</a></li>
                    <li><a href="index.php?controller=ingredient&action=createIngredientImpact&task=form">Ajouter un type d'impact</a></li>
                    <li><a href="index.php?controller=ingredient&action=createIngredientOrigin&task=form">Ajouter un type d'origine</a></li>
                </ul>           
            </li>

            <li class="schroll"><a href="#">Labels</a>
                <ul class="sub-list">
                    <li><a href="index.php?controller=label&action=createLabel&task=form">Ajouter un label</a></li>
                </ul>           
            </li>
        </ul>
    </nav>-->

    <div class="row">
        <div class="col-2">
            <a href="index.php">
                <img id="logo-image" alt="Cream Code" src=<?= $logoPath ?> >
            </a>
        </div>

        <div class="col">
            <nav class="navbar navbar-expand-lg">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Produits
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="index.php?controller=product&action=createProduct&task=form">Ajouter un produit</a></a>
                                <a class="dropdown-item" href="index.php?controller=product&action=addAlternatives&task=form">Ajouter des alternatives</a>
                                <a class="dropdown-item" href="index.php?controller=product&action=getProduct&task=form">Rechercher un produit</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Marques
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="index.php?controller=brand&action=createBrand&task=form">Ajouter une marque</a>
                                <a class="dropdown-item" href="index.php?controller=brand&action=getBrands">Toutes les marques</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ingrédients
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="index.php?controller=ingredient&action=createIngredient&task=form">Ajouter un ingrédient</a>
                                <a class="dropdown-item" href="index.php?controller=ingredient&action=createIngredientImpact&task=form">Ajouter un type d'impact</a>
                                <a class="dropdown-item" href="index.php?controller=ingredient&action=createIngredientOrigin&task=form">Ajouter un type d'origine</a>
                                <a class="dropdown-item" href="index.php?controller=ingredient&action=getIngredients">Tous les ingrédients</a>
                                <a class="dropdown-item" href="index.php?controller=ingredient&action=getIngredientImpacts">Tous les types d'impacts</a>
                                <a class="dropdown-item" href="index.php?controller=ingredient&action=getIngredientOrigins">Tous les types d'origines</a>
                                <!--<a class="dropdown-item" href="index.php?controller=ingredient&action=searchIngredientOrigin&task=form">Chercher une origine</a>-->
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Labels
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="index.php?controller=label&action=createLabel&task=form">Ajouter un label</a>
                                <a class="dropdown-item" href="index.php?controller=label&action=getLabels">Tous les labels</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>    
    </div>
</header>