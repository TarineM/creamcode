<div class="form_create">
    <h2>Ajouter une marque</h3>
    <br/>

    <form action="index.php?controller=brand&action=createBrand" method="POST">
        <div class="form-group row">
            <div class="col-3">
                <label>Nom: </label>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="name" name="name" required> 
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
            <label>Nom du dossier: </label>
            </div>
            <div class="col">
            <input type="text" class="form-control" id="folder_name" name="folder_name" required>
            </div>
        </div>

        <button class="form_buttons">Ajouter</button>
    </form>
</div>
