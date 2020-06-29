$(document).ready(function() {

   $(".all_impact_color").each(function() {
      var colorId = '#' + this.id;
      $(this).css('background-color', colorId);
   });

   $(".product_impact_color").each(function() {
      var colorId = '#' + this.id;
      $(this).css('color', colorId);
      $(this).css('font-weight', 'bold');
      var impact_name = $(this).text().toUpperCase();
      $(this).text(impact_name);
   });

   // Single Select
   $("#search_autocomplete_origin").autocomplete({
      source: "../Admin/Ingredient/find_ingredient_origin.php",
      minLength: 2,
      select: function( event, ui ) {
         $("#search_autocomplete_origin").val(ui.item.label);
         $("#origin_id").val(ui.item.id);
         //window.location.href = ui.item.value;
      }
   });

});