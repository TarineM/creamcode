<form action="index.php?controller=product&action=getProduct&task=form" method="POST">
    <button class="raccourci_buttons">Rechercher un autre produit</button>
</form>

    <br/>

<div id="product-identity">
<h3 class="titles">Identité du produit</h3>
    <div id="content">
        <div class="row">
            <div class="col-5">
                <div id="product_image">
                    <?php
                        // changer en sprintf
                        $pictureProductPath = '../Assets/IMG/brands/' . $product->getBrand()->getFolder()->getName() . '/';
                        $pictureLabelPath = '../Assets/IMG/labels/';
                    ?>
                    <img src="<?= $pictureProductPath . $product->getPicture()->getId() . '.png' ?>"
                    alt="<?= $product->getName() ?>" title="<?= $product->getName() ?>" />
                </div>
            </div>
            <div class="col">
                <div id="product_description">
                    <p><strong>Marque:</strong> <?= $product->getBrand()->getName() ?></p>
                    <p><strong>Nom:</strong> <?= $product->getName()?></p>
                    <p><strong>Type:</strong> <?= $product->getType()->getName() ?></p>
                    <p>
                        <strong>Certifications:</strong>
                        <?php if (count($product->getCertifications()) > 0) : ?>
                            <?php foreach ($product->getCertifications() as $label) : ?>
                                <img src="<?= $pictureLabelPath . $label->getPicture()->getName() . '.png' ?>"
                                alt="<?= $label->getName() ?>" title="<?= $label->getName() ?>" />
                            <?php endforeach ?>
                        <?php endif ?>
                    </p>
                </div>
            </div>
        </div>  
    </div>
</div>

<br/>

<div id="product-composition">
    <h3 class="titles">Liste INCI</h3>
    <div id="content">
        <div class="row">
            <table class="table table-striped table-bordered" id="product_ingredients">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Ingredient</th>
                        <th scope="col">Origine</th>
                        <th scope="col">Humain</th>
                        <th scope="col">Environnement</th>
                        <th scope="col">Infos supplémentaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ingredients = $product->getComposition()->getIngredientsWithPositions(); ?>
                    <?php foreach ($ingredients as $ingredientPosition) : ?>
                        <?php $ingredient = $ingredientPosition['ingredient']; ?>
                        <tr>
                            <td><?= $ingredient->getName() ?></td>
                            <td><?= $ingredient->getOrigin()->getName() ?></td>
                            <td>
                                <p class="product_impact_color" id="<?= $ingredient->getHumanImpact()->getColor() ?>"><?= $ingredient->getHumanImpact()->getImpactLevel() ?></p>
                            </td>
                            <td>
                                <p class="product_impact_color" id="<?= $ingredient->getEnvironmentImpact()->getColor() ?>"><?= $ingredient->getEnvironmentImpact()->getImpactLevel() ?></p>
                            </td>
                            <td class="metadata"><?= $ingredient->getMetadata() ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br/>
<br/>
    

<?php if (true === $product->getHasAlternative()) : ?>
    <?php $i = 0; ?>
    <div id="product-alternatives">
        <h3 class="titles">Alternatives</h3>
        <div id="content">
            <?php foreach ($alternatives as $alternative) : ?>
                <div id="alternative-<?= $i ?>" class="row show-alternatives">
                    <div id="alternative_image">
                        <a href="index.php?controller=product&action=getProduct&id=<?= $alternative->getId() ?>">
                            <?php 
                                $pictureAlternativePath = '../Assets/IMG/brands/' . $alternative->getBrand()->getFolder()->getName() . '/';
                            ?>
                            <img src="<?= $pictureAlternativePath . $alternative->getPicture()->getId() . '.png' ?>"
                            alt="<?= $alternative->getName() ?>" title="<?= $alternative->getName() ?>" />
                        </a>
                    </div>
                    <div id="alternative_description" class="align-self-center">
                        <small id="alternative_brand"><?= $alternative->getBrand()->getName() ?></small>
                        <p><?= $alternative->getName() ?></p>
                    </div> 
                </div>
                <?php $i = $i+1; ?>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>