<p id="product_search">
    <form id="form-get-product" action="product.html.php" method="GET">
        <input type="hidden" name="controller" value="product">
        <input type="hidden" name="task" value="get">
        <input id="name" type="text" name="name" placeholder="Rechercher un produit"
        required oninvalid="this.setCustomValidity('Veuillez remplir ce champs correctement')"
        oninput="this.setCustomValidity('')" >
        <input type="hidden" name="id">
    </form>
</p>
