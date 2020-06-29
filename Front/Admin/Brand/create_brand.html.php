<div class="form_create">
    <h2>Ajouter une marque</h2>
    <br/>

    <form action="index.php?controller=brand&action=createBrand" method="POST" enctype="multipart/form-data">
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
                <label class="col-form-label">Logo de la marque: </label>
            </div>
            <div class="col">
                <input type="file" class="form-control-file" name="brand_picture" id="brand_picture" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-3">
                <label class="col-form-label">Nom du dossier: </label>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="folder_name" name="folder_name" required>
            </div>
        </div>

        <button class="form_buttons">Ajouter</button>
    </form>
</div>
