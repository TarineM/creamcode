<div class="form_create">
    <h2>Ajouter un impact</h3>
    <br/>
    <br/>
    <form action="index.php?controller=ingredient&action=createIngredientImpact" method="POST">

        <div class="form-group row">
            <div class="col-3">
                <label>Nom: </label>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="impact_level" name="impact_level" required> 
            </div>
        </div>
        <div class='form-group row'>
            <div class="col-3">
                <label>Couleur:</label>
            </div>
            <div class="col">
                <input class="form-control" type="color" id="color" name="color" required>
            </div>
        </div>

        <button class="form_buttons">Ajouter</button>
    </form>
</div>
