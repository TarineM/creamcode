<h2>Toutes les marques</h2>
<br/>

<form action="index.php?controller=brand&action=createBrand&task=form" method="POST">
    <button class="raccourci_buttons">Ajouter une nouvelle marque</button>
</form>


<br/>

<?php
    $pictureBrandPath = '../../Back/Pictures/cosmetic/brands/';
?>

<div class="all-get">
    <table class="all-tab">
        <?php $i = 0; ?>
        <?php foreach($brandsPresenter as $brand): ?>

            <?php if ($i === 0): ?>
                <tr>
            <?php endif ?>
            <?php $pictureName =  $brand->getPicture()->getName(); ?>
            <td>
                <img class="pictures_brand" src="<?= $pictureBrandPath . $pictureName . '/' . $pictureName . '.png' ?>" alt="<?= $brand->getName() ?>" title="<?= $brand->getName() ?>">
            </td>

            <?php $i+= 1; ?>
            <?php if ($i === 4) : ?>
                </tr>
                <?php $i = 0; ?>
            <?php endif ?>

        <?php endforeach ?>
        </tr>
    </table>
</div>