require('./bootstrap');

import Vue from 'vue';

import App from './components/app';

import BootstrapVue from 'bootstrap-vue' //Importing

Vue.use(BootstrapVue) 

const app = new Vue({
    el: '#app',
    components: {App}
})