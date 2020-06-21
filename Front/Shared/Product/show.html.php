<div id="product-identity">
    <div id="product_image">
        <img src="<?= $product['picture_name'] ?>" alt="<?= $product['name'] ?>" />
    </div>
    <div id="product_description">
        <p>Marque: <?= $product['brand_name']?></p>
        <p>Nom: <?= $product['name']?></p>
        <p>Type: <?= $product['type'] ?></p>
        <p>Labels</p>       <!-- boucle -->
    </div>
</div>

<div id="product-composition">
    <table id="product_ingredients">
        <tr>
            <th>Ingredient</th>
            <th>Origine</th>
            <th>Humain</th>
            <th>Environnement</th>
            <th>Infos supplémentaire</th>
        </tr>
        <?php foreach ($product['composition'] as $ingredient) : ?>
            <tr>
                <td><?= $ingredient['name'] ?></td>
                <td><?= $ingredient['origin'] ?></td>
                <td><?= $ingredient['human_impact'] ?></td> <!-- couleur -->
                <td><?= $ingredient['environment_impact'] ?></td>
                <td><?= $ingredient['metadata'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    
    <?php if (true === $product['has_alternative']) : ?>
        <?php foreach ($product['alternatives'] as $alternativeProduct) : ?>
            <div class="product-alternatives">
                <div id="alternative_image">
                    <a href="product.html.php?controller=product&task=get&id"<?=$alternativeProduct['id']?>>
                        <img src="<?= $alternativeProduct['picture_name'] ?>" alt="<?= $alternativeProduct['name'] ?>" />
                    </a>
                </div>
                <div id="alternative_description">
                    <span><?= $alternativeProduct['brand_name']?> - <?= $alternativeProduct['name']?></span>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>