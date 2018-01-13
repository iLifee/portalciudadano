
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('reporte', require('./components/ReporteComponent.vue'));
Vue.component('formulario', require('./components/FormularioComponent.vue'));
// Vue.use(VeeValidate);

const app = new Vue({
    el: '#app'
});
