
import Vue from 'vue';
import Vuex from 'vuex';

import accessories from './modules/accessories';


Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        accessories,
    }
})