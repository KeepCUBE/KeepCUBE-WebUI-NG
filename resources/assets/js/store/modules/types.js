import * as api from '../../api/types'

const state = {
  types: []
}

const getters = {
  allTypes: state => state.types
}

const actions = {
  getTypesFromApi({ commit }) {
    api.getAllTypes(types => {
      commit('setTypes', {types})
    })
  }
}

const mutations = {
  setTypes(state, {types}) {
    state.types = types
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}