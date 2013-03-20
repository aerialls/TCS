$(document).ready(function() {
    /* Tabs */
    $('#tab-maps a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // Erase everything
    $('.layer').hide();
    $('.layer-checkbox').attr('checked', false);

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

   // Tooltips
   $('.tec-local').tooltip({
       container: 'body'
   });
});