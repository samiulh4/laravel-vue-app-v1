import VueRouter from 'vue-router';

import SignInForm from './components/sign-in/SignInForm.vue';

import HomePage from './components/home/HomePage';

import About from './components/about/About.vue';
// Blog Components
import BlogCreate from './components/blogs/BlogCreate.vue';
import BlogIndex from './components/blogs/BlogIndex.vue';
import BlogDetails from "./components/blogs/BlogDetails.vue";

let routes = [
    {path: '/about', component: About, name: 'About'},

    {path: '/sign-in', component: SignInForm, name: 'SignInForm'},

    {path: '/home', component: HomePage, name: 'HomePage'},

    // Blog Routes
    {path: '/blog/create', component: BlogCreate, name: 'BlogCreate'},
    {path: '/blog/index', component: BlogIndex, name: 'BlogIndex'},
    {path: '/blog/details/:id', component: BlogDetails, name: 'BlogDetails'},
];

export default new VueRouter({
    routes,
    // history: true,
    // mode: 'history',
});
