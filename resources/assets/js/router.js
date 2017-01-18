/**
 * Created by ddos on 30.11.16.
 */
/**
 * Router components
 */
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import accesories from './components/pages/Accessories/index.vue'
import main from './components/pages/Dashboard/index.vue'
import rooms from './components/pages/Rooms/index.vue'
import users from './components/pages/Users/index.vue'

const routes = [
    {path: '/', name: 'dashboard', component: main},
    {path: '/home', name: 'dashboard', component: main},
    {path: '/accessories', name: 'accessories', component: accesories},
    {path: '/rooms', name: 'rooms', component: rooms},
    {path: '/users', name: 'users', component: users},
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
