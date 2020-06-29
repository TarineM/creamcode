<div class="form_create">
    <h2>Ajouter un type cosmétique</h2>
    <br/>

    <form action="index.php?controller=product&action=createType" method="POST">
        <div class="form-group row">
            <div class="col-3">
                <label class="col-form-label zip">Nom: </label>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="name" name="name" required> 
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
            <label class="col-form-label">Nom de l'image: </label>
            </div>
            <div class="col">
            <input type="text" class="form-control" id="picture_name" name="picture_name" required>
            </div>
        </div>

        <button class="form_buttons">Ajouter</button>
    </form>
</div>
