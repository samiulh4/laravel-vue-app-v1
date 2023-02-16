require('./bootstrap');
import Vue from 'vue';  // Importing Vue Library
window.Vue = require('vue');

import VueRouter from 'vue-router'; // importing Vue router library
import router from './routes';
Vue.use(VueRouter);

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

import store from './store';

Vue.component('root', require('./components/Root.vue').default);
const app = new Vue({ router,store }).$mount('#root');
