const Turbolinks = require('turbolinks');
const feather = require('feather-icons');

document.addEventListener('turbolinks:load', function() {
  if (document.getElementById('toggle-menu')) {
    document.getElementById('toggle-menu').onclick = function () {
      document.getElementById('menu').style.display = document.getElementById('menu').style.display === 'block' ? 'none' : 'block';
    };
  }
  feather.replace();
  // Your application logic here
});

Turbolinks.start();
