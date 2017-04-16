
require('./bootstrap')
require('../../../vendor/bower_dl/timeliner/timeliner')

import router from './router'
import store from './store'
import VueBus from 'vue-bus'
import http from 'vue'

Vue.use(VueBus)

Vue.component('App', require('./components/App.vue'))

Vue.directive('mdl', {
  bind: function (el) {
    componentHandler.upgradeElement(el)
  }
})
Vue.directive('timeliner', {
  bind: function (el) {
    new Timeliner(el)
  }
})

Vue.config.devtools = true
Vue.config.silent = false

new Vue({
  router,
  store,
  http,
  el: '#app',
  filters: {
  },
  created() {
    window.addEventListener('keyup', (event) => {
      if(event.code == 'Escape' || event.keyCode == 27){
        this.$bus.$emit('esc-press')
      } else if(event.code == 'Enter') {
        this.$bus.$emit('enter-press')
      }
    })
  }
})