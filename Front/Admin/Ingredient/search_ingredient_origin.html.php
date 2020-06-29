<div class="form_create">
    <h2>Chercher une origine d'ingrédient</h2>
    <br/>
    <br/>
    <form action="index.php?controller=ingredient&action=getIngredient" method="post">
        <div class="form-group row">
            <input class="col" type="text" id='search_autocomplete_origin' name="origin_name" placeholder="Origine ingrédient">
            <input class="form-control" type="hidden" id="origin_id" name="origin_id" autocomplete="off" /> 
        </div>
        <button class="form_buttons">Rechercher</button>
    </form>

</div>