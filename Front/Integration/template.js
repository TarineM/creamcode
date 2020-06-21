$(document).ready(function() {
    $(".all_impact_color").each(function() {
        var colorId = '#' + this.id;
        $(this).css('background-color', colorId);
      });
});