require('./bootstrap');
import Vue from 'vue';  // Importing Vue Library
window.Vue = require('vue');

import VueRouter from 'vue-router'; // importing Vue router library
import router from './routes';
Vue.use(VueRouter);



Vue.component('root', require('./components/Root.vue').default);
const app = new Vue({ router }).$mount('#root');
