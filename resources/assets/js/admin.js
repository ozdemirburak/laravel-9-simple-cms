$(function() {
    $('input[type=date]').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true
    });

    $('#color').colorpicker().on('changeColor.colorpicker', function(event){
        $(this).css('background-color', event.color.toHex());
    });

    if( !$('input[type=date]').val() ) {
        $('input[type=date]').datepicker("setDate", new Date());
    }

    $('img.chosen-one').click(function(){
        $('input[name="language"]').val($(this).attr("alt"));
        $('#anakin-skywalker').submit();
    });
});
