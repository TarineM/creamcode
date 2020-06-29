<div class="form_create">
    <h2>Ajouter des alternatives</h2>
    <br/>

    <form action="index.php?controller=product&action=addAlternatives" method="post">
        <div class="form-group row">
            <div class="col-3">
                <label class="col-form-label">Produit original: </label>
            </div>
            <div class="col">
                <input class="form-control" type="text" id='search_original_product' name="original_name" placeholder="Rechercher un nom de produit">
                <input class="form-control" type="hidden" id="original_id" name="original_id" autocomplete="off" />
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label class="col-form-label">Alternatives: </label>
            </div>
            <div class="col">
                <input class="form-control" type="text" id='search_alternative_product' name="alternative_name" placeholder="Rechercher un nom de produit">
                <input class="form-control" type="hidden" id="search_alternative_id" name="alternative_id" autocomplete="off" />
            </div>
        </div>

        <br/>

        <div class="alternatives"></div>

        <br/><br/>

        <button class="form_buttons">Ajouter ce produit</button>
        <!-- checker pour le produit en lui-même dans les 2 input-->
    </form>

</div>