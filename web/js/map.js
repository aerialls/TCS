$(document).ready(function() {
    var container = $('.map-container');
    // var initialData = [false, false, true]; // display nothing

    // Erase everything
    $('.layer').hide();
    $('.layer-checkbox').attr('checked', false);

    /*
    for (var i = 1; i <= initialData.length; i++) {
        if (initialData[i - 1]) {

        }
    }
    */

   $('.layer-checkbox').change(function() {
      var $this = $(this);
      var id = $this.data('layer');

      if ($this.is(':checked')) {
          // the checkbox is checked
          $('#layer-' + id).show();
      } else {
          $('#layer-' + id).hide();
      }
   });
});