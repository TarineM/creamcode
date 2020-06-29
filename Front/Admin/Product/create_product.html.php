<div class="form_create">
    <h2>Ajouter un produit</h2>
    <br/>

    <form action="index.php?controller=product&action=createProduct" method="POST" enctype="multipart/form-data">
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
            <label class="col-form-label">Marque: </label>
            </div>
            <div class="col">
            <select class="form-control" name="brand_id" id="brand_id" required>
                <option value="" selected></option>
                <?php foreach($brandsPresenter as $brand): ?>
                    <option value="<?= $brand->getId() ?>"><?= $brand->getName() ?></option>
                <?php endforeach ?>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
            <label class="col-form-label">Type: </label>
            </div>
            <div class="col">
            <select class="form-control" name="type_id" id="type_id" required>
                <option value="" selected></option>
                <?php foreach($typesPresenter as $type): ?>
                    <option value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
                <?php endforeach ?>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label class="col-form-label">Image: </label>
            </div>
            <div class="col">
                <input type="file" class="form-control-file" name="product_picture" id="product_picture" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label class="col-form-label">Labels: </label>
            </div>
            <div class="col">
                    <?php $i = 0; ?>
                <table class="product_labels">
                    <?php foreach ($labelsPresenter as $label) : ?>
                        <?php if ($i === 0): ?>
                            <tr>
                        <?php endif ?>
                        <td>
                            <div class="form-check labels_checkbox">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="certifications[]" id="<?= $label->getId() ?>" value="<?= $label->getId() ?>">
                                    <?= $label->getName() ?>
                                </label>
                            </div>
                        </td>
                        <?php $i+= 1; ?>
                        <?php if ($i === 2): ?>
                            </tr>
                            <?php $i = 0; ?>
                        <?php endif ?>
                    <?php endforeach ?>
                </table>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3"></div>
            <div class="col">
                <input type="text" class="form-control" id="search_ingredient_name" name="ingredient_name" placeholder="Ajouter un ingrédient">
                <input type="hidden" id="ingredient_id" name="ingredient_id" />
            </div>
        </div>

        <br/>

        <div class="form-group row">
            <div class="col-3">
                <label class="col-form-label">Liste INCI: </label>
                <input class="form-control" type="button" id="regarder" value="Regarder" />
            </div>
            <div class="col">
                <textarea class="form-control" id="list_name_ingredients" rows="10" required></textarea>  
                <textarea id="list_id_ingredients" name="composition" required></textarea>      
            </div>             
        </div>
                
        <br/><br/>

        <button class="form_buttons">Ajouter ce produit</button>
    </form>
</div>
