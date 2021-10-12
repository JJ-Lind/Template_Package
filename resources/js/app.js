require('./bootstrap');

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

import PerfectScrollbar from 'perfect-scrollbar';

(function() {
    new PerfectScrollbar(document.querySelector('#container'));
})();
