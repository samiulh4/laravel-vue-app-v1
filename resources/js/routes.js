import VueRouter from 'vue-router';
import About from './components/about/About.vue';

import BlogCreate from './components/blogs/BlogCreate.vue';

let routes = [
    {path: '/about', component: About, name: 'About'},
    
    {path: '/blog/create', component: BlogCreate, name: 'BlogCreate'},    
];

export default new VueRouter({
    routes,
    // history: true,
    // mode: 'history',
});
