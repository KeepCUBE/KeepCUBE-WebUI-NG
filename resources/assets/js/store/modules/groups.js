import * as api from '../../api/groups'

const state = {
  groups: []
}

const getters = {
  allGroups: state => state.groups
}

const actions = {
  getGroupsFromApi({ commit }) {
    api.getAllGroups(groups => {
      commit('setGroups', {groups})
    })
  }
}

const mutations = {
  setGroups(state, {groups}) {
    state.groups = groups
  }
};

export default {
  state,
  getters,
  actions,
  mutations
}