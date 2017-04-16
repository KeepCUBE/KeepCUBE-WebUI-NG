import Vue from 'vue'
import Vuex from 'vuex'

import devices from './modules/devices'
import groups from './modules/groups'
import types from './modules/types'
import dashcards from './modules/dashcards'

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    devices,
    groups,
    types,
    dashcards
  }
})