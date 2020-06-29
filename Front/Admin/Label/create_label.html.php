<div class="form_create">
    <h2>Ajouter un label cosmétique</h2>
    <br/>

    <form action="index.php?controller=Label&action=createLabel" method="POST" enctype="multipart/form-data">
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
                <label class="col-form-label">Logo du label: </label>
            </div>
            <div class="col">
                <input type="file" class="form-control-file" name="label_picture" id="label_picture" required>
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
