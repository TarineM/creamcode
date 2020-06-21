<h2>Tous les types d'origines</h2>
<br/>

<form action="index.php?controller=ingredient&action=createIngredientOrigin&task=form" method="POST">
    <button class="raccourci_buttons">Ajouter une nouvelle origine d'ingrédient</button>
</form>


<br/>

<div class="get-all">
    <table class="all-tab">
        <?php $i = 0; ?>
        <?php foreach($originsPresenter as $origin): ?>

            <?php if ($i === 0): ?>
                <tr>
            <?php endif ?>

            <td><?= $origin->getName() ?></td>

            <?php $i+= 1; ?>
            <?php if ($i === 4) : ?>
                </tr>
                <?php $i = 0; ?>
            <?php endif ?>

        <?php endforeach ?>
        </tr>
    </table>
</div>