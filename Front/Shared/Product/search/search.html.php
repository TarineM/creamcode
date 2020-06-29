<div class="form_get">

    <h2>Chercher un produit</h2>
    <br/>
    <br/>

    <form action="index.php" method="GET">
        <div class="form-group row">
            <input class="form-control" type="hidden" name="controller" value="product" />
            <input class="form-control" type="hidden" name="action" value="getProduct" />
            <input class="form-control" type="text" id='search_autocomplete_product' name="product_name" placeholder="Rechercher un nom de produit" required>
            <input class="form-control" type="hidden" id="search_product_id" name="id" autocomplete="off" required/> 
        </div>
        <button class="form_buttons">Rechercher</button>
    </form>

</div>