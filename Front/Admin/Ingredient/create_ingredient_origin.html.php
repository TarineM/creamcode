<div class="form_create">
    <h2>Ajouter une origine</h2>
    <br/>
    <br/>
    <form action="index.php?controller=ingredient&action=createIngredientOrigin" method="POST">

        <div class="form-group row">
            <div class="col-3">
                <label class="col-form-label">Nom: </label>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="name" name="name" required> 
            </div>
        </div>

        <button class="form_buttons">Ajouter</button>
    </form>
</div>
