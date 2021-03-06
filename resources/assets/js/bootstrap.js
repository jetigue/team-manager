import Vue from 'vue';
import axios from 'axios';
import Form from './utilities/Form';
import Errors from './utilities/Errors';

window.swal = require('sweetalert2');

window.Vue = require('vue');

window.$ = window.jQuery = require('jquery');

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Event = new Vue();

window.events = new Vue();

window.flash = function (message, level = 'success') {
    window.events.$emit('flash', { message, level});
};

window.Form = Form;
window.Errors = Errors;