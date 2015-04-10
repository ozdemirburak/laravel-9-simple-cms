$(function() {

    $('#date').datepicker({
        language: 'tr',
        format: 'yyyy-mm-dd',
        todayHighlight: true
    });

    $('#color').colorpicker().on('changeColor.colorpicker', function(event){
        $(this).css('background-color', event.color.toHex());
    });

    if( !$("#date").val() ) {
        $("#date").datepicker("setDate", new Date());
    }

});