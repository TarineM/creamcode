$(document).ready(function() {

  $("#search_autocomplete_product").autocomplete({
    source: "./../Admin/Product/search/find_products.php",
    minLength: 2,
    open: function(event, ui) { 
      $('.ui-autocomplete').css('text-align', 'initial');
    },
    select: function( event, ui ) {
       $("#search_autocomplete_product").val(ui.item.label);
       $("#search_product_id").val(ui.item.id);
    }
});

    $("#search_original_product").autocomplete({
      source: "./../Admin/Product/search/find_products.php",
      minLength: 2,
      open: function(event, ui) { 
        $('.ui-autocomplete').css('text-align', 'initial');
      },
      select: function( event, ui ) {
         $("#search_original_product").val(ui.item.label);
         $("#original_id").val(ui.item.id);
      }
  });

  $("#search_alternative_product").autocomplete({
    source: "./../Admin/Product/search/find_products.php",
    minLength: 2,
    open: function(event, ui) { 
      $('.ui-autocomplete').css('text-align', 'initial');
    },
    select: function( event, ui ) {
       $("#search_alternative_product").val(ui.item.label);
       $("#search_alternative_id").val(ui.item.id);
       addFieldsMe();
       $(this).val(''); return false;
    }
  });

  function addFieldsMe() {
    var productName = $('#search_alternative_product').val();
    var productId = $('#search_alternative_id').val();

    var rowNum = $('div.alternatives div.list-alternatives').length;
    var div_id = "alternative-" + rowNum;
    var input_alternative_id = "alternative_name_" + rowNum;
    var input_hidden_id = "alternative_id_" + rowNum;
    var remove_alternative_id = "remove_alternative_" + rowNum;

    var rowDiv = '<div id="' + div_id + '" class="form-group row list-alternatives"></div>';
    var inputAlternative = '<div class="col-9">';
    var inputHidden = '<input class="form-control alternative_name" type="hidden" id="' + input_hidden_id + '" name="alternatives_id[]" />';
    
    inputAlternative+= '<input class="form-control alternative_id" type="text" id="' + input_alternative_id + '" name="alternatives_name[]" disabled="disabled" />';
    inputAlternative+= inputHidden;
    inputAlternative+= '</div>';

    inputAlternative+= '<div class="col">';
    inputAlternative+= '<input class="form-control alternative_remove" type="button" id="' + remove_alternative_id + '" value="Supprimer" />';
    inputAlternative+= '</div>';

    $('div.alternatives').append(rowDiv);
    $('#' + div_id).append(inputAlternative);
    $('#' + input_alternative_id).val(productName);
    $('#' + input_hidden_id).val(productId);
  }

  $(document).on('click','.list-alternatives input.alternative_remove', function(){
    var id_remove =  $(this).attr('id');
    var id_remove = id_remove.substr(id_remove.length - 1);
    $("div#alternative-" + id_remove).remove();
    resetIndexes();
  }); 

  function resetIndexes(){
    j = 0;
    $('div.list-alternatives').each(function(){
        $(this).attr('id', 'alternative-' + j);
        $(this).find('input.alternative_name').eq(0).attr('id', 'alternative_name_' + j);
        $(this).find('input.alternative_id').eq(0).attr('id', 'alternative_id_' + j);
        $(this).find('input.alternative_remove').eq(0).attr('id', 'remove_alternative_' + j);
        j++;    
    });
}
 
 });