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
      commit('SET_GROUPS', {groups})
    })
  },
  createGroup({ commit }) {
    /*api.createGroup({ commit }, id => {*/
      commit('ADD_GROUP', {devices: []})
    /*})*/
  }
}

const mutations = {
  SET_GROUPS(state, {groups}) {
    state.groups = groups
  },
  ADD_GROUP(state, group) {
    state.groups.push(group)
  },
  REMOVE_GROUP(state, key) {
    delete state.groups[key]
  }
};

export default {
  state,
  getters,
  actions,
  mutations
}