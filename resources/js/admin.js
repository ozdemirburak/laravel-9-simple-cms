window.$ = window.jQuery = require('jquery');

const trumbowyg = require('trumbowyg');
const base64 = require('trumbowyg/plugins/base64/trumbowyg.base64.js');
const noembed = require('trumbowyg/plugins/noembed/trumbowyg.noembed.js');
const preformatted = require('trumbowyg/plugins/preformatted/trumbowyg.preformatted.js');
const colors = require('trumbowyg/plugins/colors/trumbowyg.colors.js');
const flatpickr = require('flatpickr');
const feather = require('feather-icons');

require('datatables.net');
require('datatables.net-buttons');
require('datatables-bulma');
require('../../vendor/yajra/laravel-datatables-buttons/src/resources/assets/buttons.server-side.js');

$(function() {
  $(".datepicker").flatpickr();
  $('.notification').not('.is-permanent').delay(3000).fadeOut(350);
  $('#editor').trumbowyg({
    btns: [
      ['formatting'],
      ['link', 'insertImage', 'base64', 'noembed'],
      ['preformatted', 'backColor', 'strong', 'em', 'del', 'unorderedList'],
      ['viewHTML']
    ],
    resetCss: true
  });
  $('.file-input').on('change', function () {
    $(this).parent().find('.file-name').removeClass('is-hidden').text(this.value.replace(/.*[\/\\]/, ''));
  });
  feather.replace();
});
