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
    let reindexedTypes = {}
    types.forEach((item) => {
      reindexedTypes[item.id] = item
    })
    state.types = reindexedTypes
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}