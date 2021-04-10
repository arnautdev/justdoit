"use strict";
try {
    //// base js
    require('pace-js/pace');
    window.$ = window.jQuery = require('jquery');
    require('jqueryui');
    require('bootstrap');
    require('jquery-slimscroll/jquery.slimscroll');
    window.Cookies = require('js-cookie');
    window.moment = require('moment/moment')
    require('./app');
    require('../assets/js/theme/default');

    require('../assets/js/demo/form-plugins.demo');

    /// plugins
    require('parsleyjs/src/parsley');
    require('bootstrap-datepicker/dist/js/bootstrap-datepicker');
    require('bootstrap-daterangepicker/daterangepicker');
    require('select2/dist/js/select2');

    /// chart js
    require('../assets/js/demo/chart-js.demo');

} catch (e) {
    console.log(e);
}

if ($('meta[name="csrf-token"]').length > 0) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
