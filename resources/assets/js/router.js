import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import devices from './components/pages/Devices/Devices.vue'
import main from './components/pages/Dashboard/Dashboard.vue'
import rooms from './components/pages/Rooms/Rooms.vue'
import users from './components/pages/Users/Users.vue'

const routes = [
  {path: '/', name: 'dashboard', component: main},
  {path: '/home', name: 'dashboard', component: main},
  {path: '/accessories', name: 'accessories', component: devices},
  {path: '/rooms', name: 'rooms', component: rooms},
  {path: '/users', name: 'users', component: users},
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router
