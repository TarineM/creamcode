<h2>Toutes les types d'impacts</h2>
<br/>

<form action="index.php?controller=ingredient&action=createIngredientImpact&task=form" method="POST">
    <button class="raccourci_buttons">Ajouter un nouveau type d'impact</button>
</form>


<br/>

<div class="get-all">
    <table class="all-tab">
        <?php foreach($impactsPresenter as $impact): ?>
            <tr>
                <td><?= $impact->getImpactLevel() ?></td>
                <td class="all_impact_color" id="<?= $impact->getColor() ?>"></td>
            </tr>
        <?php endforeach ?>
        </tr>
    </table>
</div>