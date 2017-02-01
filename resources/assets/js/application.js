window.$ = window.jQuery = require('jquery');

require('bootstrap-sass');

$(function() {
  $('iframe[src*="youtube.com"]').each(function() {
    if (!$(this).hasClass('embed-responsive-item')) {
      $(this).wrap("<div class='row'><div class='col-sm-6 padding-left-0'><div class='embed-responsive embed-responsive-16by9'></div></div></div>");
      $(this).addClass("embed-responsive-item");
    }
  });

  var WebFont = require('webfontloader');

  WebFont.load({
    google: {
      families: ['Open+Sans:400,700:latin,latin-ext']
    }
  });

  $("body").floatingSocialShare({
    buttons: ["facebook", "twitter", "google-plus"],
    text: ""
  });

  $('.chosen-one').click(function(){
    $('input[name="language"]').val($(this).data("code"));
    $('#anakin-skywalker').submit();
  });
});
