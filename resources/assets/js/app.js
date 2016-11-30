
require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */



import router from './router';
import store from './store';

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
    }
});

