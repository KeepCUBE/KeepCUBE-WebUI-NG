
require('./bootstrap');

import router from './router';
import store from './store';
import VueBus from 'vue-bus';

Vue.use(VueBus);

Vue.component('App', require('./components/App.vue'));

Vue.directive('mdl', {
    bind: function (el) {
        componentHandler.upgradeElement(el);
    }
});

Vue.config.devtools = true;
Vue.config.silent = false;

new Vue({
    router,
    store,
    el: '#app',
    filters: {
    },
    created() {
        window.addEventListener('keyup', (event) => {
            if(event.code == 'Escape'){
                this.$bus.$emit('esc-press');
            }
        });
    }
});

