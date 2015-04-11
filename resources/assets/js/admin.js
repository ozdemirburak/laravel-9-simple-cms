$(function() {

    $('#published_at').datepicker({
        language: 'tr',
        format: 'yyyy-mm-dd',
        todayHighlight: true
    });

    $('#color').colorpicker().on('changeColor.colorpicker', function(event){
        $(this).css('background-color', event.color.toHex());
    });

    if( !$("#published_at").val() ) {
        $("#published_at").datepicker("setDate", new Date());
    }

});