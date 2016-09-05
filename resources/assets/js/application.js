$(function() {
    $('iframe[src*="youtube.com"]').each(function() {
        if (!$(this).hasClass('embed-responsive-item')) {
            $(this).wrap("<div class='row'><div class='col-sm-6 padding-left-0'><div class='embed-responsive embed-responsive-16by9'></div></div></div>");
            $(this).addClass("embed-responsive-item");
        }
    });

    WebFont.load({
        google: {
            families: ['Open+Sans:400,700:latin-ext']
        }
    });

    $("body").floatingSocialShare({
        buttons: ["facebook","twitter","google-plus"],
        text: ""
    });

    $('img.chosen-one').click(function(){
        $('input[name="language"]').val($(this).attr("alt"));
        $('#anakin-skywalker').submit();
    });
});
