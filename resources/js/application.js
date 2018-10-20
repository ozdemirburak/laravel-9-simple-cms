const Turbolinks = require('turbolinks');

document.addEventListener('turbolinks:load', function() {
  document.getElementById('toggle-menu').onclick = function () {
    document.getElementById('menu').style.display = document.getElementById('menu').style.display === 'block' ? 'none' : 'block';
  }
  // Your application logic here
});

Turbolinks.start();
