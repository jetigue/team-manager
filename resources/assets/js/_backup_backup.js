import Vue from 'vue';
import axios from 'axios';
import Form from './utilities/Form';
import Errors from './utilities/Errors';

window._ = require('lodash');
window.Popper = require('popper.js').default;
window.Vue = require('vue');

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

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

window.events = new Vue();

window.flash = function (message) {
    window.events.$emit('flash', message);
};

window.Form = Form;
window.Errors = Errors;