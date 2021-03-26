try {
    window.$ = window.jQuery = require('jquery');
    window.Cookies = require('js-cookie');

    require('jqueryui');
    require('bootstrap');
    require('jquery-slimscroll');
    require('parsleyjs/src/parsley');

    require('../assets/js/demo/form-plugins.demo');
    require('./bootstrap');
} catch (e) {
    console.log(e);
}
