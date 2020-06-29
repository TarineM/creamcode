<div class="get-all">
    <h2>Tous les ingrédients</h2>
    <br/>

    <form action="index.php?controller=ingredient&action=createIngredient&task=form" method="POST">
        <button class="raccourci_buttons">Ajouter un nouvel ingrédient</button>
    </form>


    <br/>

    <div class="get-all">
        <table class="all-tab">
            <tr>
                <th>Nom</th>
                <th>Origine</th>
                <th>Impact Humain</th>
                <th>Impact Environnemental</th>
                <th>Infos supplémentaires</th>
            </tr>
            <?php foreach($ingredientsPresenter as $ingredient): ?>
                <tr>
                    <td><?= $ingredient->getName() ?></td>
                    <td><?= $ingredient->getOrigin()->getName() ?></td>
                    <td><?= $ingredient->getHumanImpact()->getImpactLevel() ?></td>
                    <td><?= $ingredient->getEnvironmentImpact()->getImpactLevel() ?></td>
                    <td><?= $ingredient->getMetadata() ?></td>
                </tr>
            <?php endforeach ?>
            </tr>
        </table>
    </div>
</div>