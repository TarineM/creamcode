<div class="form_create">
    <h2>Ajouter un ingrédient</h2>
    <br/>

    <form action="index.php?controller=Ingredient&action=createIngredient" method="POST">
        <div class="form-group row">
            <div class="col-3">
                <label class="col-form-label">Nom: </label>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="name" name="name" required> 
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
            <label class="col-form-label">Origine: </label>
            </div>
            <div class="col">
            <select class="form-control" name="origin_id" id="origin_id" required>
                <option value="" selected></option>
                <?php foreach($originsPresenter as $origin): ?>
                    <option value="<?= $origin->getId() ?>"><?= $origin->getName() ?></option>
                <?php endforeach ?>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
            <label class="col-form-label">Impact Humain: </label>
            </div>
            <div class="col">
            <select class="form-control" name="human_impact_id" id="human_impact_id" required>
                <option value="" selected></option>
                <?php foreach($impactsPresenter as $impact): ?>
                    <option value="<?= $impact->getId() ?>"><?= $impact->getImpactLevel() ?></option>
                <?php endforeach ?>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
            <label class="col-form-label">Impact Environnemental: </label>
            </div>
            <div class="col">
            <select class="form-control" name="environment_impact_id" id="environment_impact_id" required>
                <option value="" selected></option>
                <?php foreach($impactsPresenter as $impact): ?>
                    <option value="<?= $impact->getId() ?>"><?= $impact->getImpactLevel() ?></option>
                <?php endforeach ?>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label class="col-form-label">Informations supplémentaires: </label>
            </div>
            <div class="col">
            <textarea class="form-control" name="metadata" id="metadata" cols="30" rows="10"></textarea>
            </div>
        </div>

        <button class="form_buttons">Ajouter</button>
    </form>
</div>
