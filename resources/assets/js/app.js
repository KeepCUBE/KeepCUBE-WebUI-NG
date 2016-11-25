
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./vendor/material.min');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import accesories from './components/pages/Accessories.vue'
import main from './components/pages/Main.vue'
import rooms from './components/pages/Rooms.vue'
import users from './components/pages/Users.vue'

const routes = [
    { path: '/home',        name: 'dashboard',  component: main },
    { path: '/accessories', name: 'accessories',component: accesories },
    { path: '/rooms',       name: 'rooms',      component: rooms },
    { path: '/users',       name: 'users',      component: users },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

Vue.component('App', require('./components/App.vue'));

Vue.config.devtools = true;
Vue.config.silent = false;
new Vue({
    router,
    el: '#app',
    filters: {
    }
});
