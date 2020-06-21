<h2>Tous les labels</h2>
<br/>

<form action="index.php?controller=label&action=createLabel&task=form" method="POST">
    <button class="raccourci_buttons">Ajouter un nouveau label</button>
</form>


<br/>

<?php
    $pictureLabelPath = '../../Back/Pictures/cosmetic/labels/';
?>

<div class="all-get">
    <table class="all-tab">
        <?php $i = 0; ?>
        <?php foreach($labelsPresenter as $label): ?>

            <?php if ($i === 0): ?>
                <tr>
            <?php endif ?>
            <?php $pictureName =  $label->getPicture()->getName(); ?>
            <td>
                <img class="pictures_label" src="<?= $pictureLabelPath . $pictureName . '.png' ?>" alt="<?= $label->getName() ?>" title="<?= $label->getName() ?>">
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