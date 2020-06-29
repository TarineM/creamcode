$(document).ready(function() {

    var currentIngr = '';
    var currentId = '';
    var newIngr = '';
    var newId = '';
     
    // Single Select
    $("#search_ingredient_name").autocomplete({
        source: "./../Admin/Ingredient/search/find_ingredients.php",
        minLength: 2,
        open: function(event, ui) { 
            $('.ui-autocomplete').css('text-align', 'initial');
        },
        select: function( event, ui ) {
            $("#search_ingredient_name").val(ui.item.label);
            $("#ingredient_id").val(ui.item.id);
            addFields();
            $(this).val(''); return false;
        }
    });
    
    function addFields() {  
        currentIngr = $('#list_name_ingredients').val();
        currentId = $('#list_id_ingredients').val();
        newIngr = $('#search_ingredient_name').val();
        newId = $("#ingredient_id").val();
    
        newIngr = (currentIngr !== "") ? ", " + newIngr : newIngr;
        newId = (currentIngr !== "") ? ", " + newId : newId;
    
        $('#list_name_ingredients').val(currentIngr + newIngr);
        $('#list_id_ingredients').val(currentId + newId);
        
        $('#ingredient_id').val('');
    }

    $("#regarder").click(function() {
        $('#list_id_ingredients').show();
    });

    /*$("form").submit(function() {
        var text = $("#list_id_ingredients").text();
        text = text.replace("+", " ");
        $("#list_id_ingredients").text(text);
    });*/

});