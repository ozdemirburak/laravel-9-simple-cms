$(function() {

  $('.datepicker').datetimepicker({
    format: 'YYYY-MM-DD',
    locale: 'tr',
    defaultDate: new Date(),
  });

  $("select").select2();

  $('#color').colorpicker().on('changeColor.colorpicker', function(event){
    $(this).css('background-color', event.color.toHex());
  });

  $('#flash-overlay-modal').modal();
  $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

  $('.chosen-one').click(function(){
    $('input[name="language"]').val($(this).data("code"));
    $('#anakin-skywalker').submit();
  });

});
