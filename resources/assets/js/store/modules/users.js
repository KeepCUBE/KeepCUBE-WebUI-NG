const state = {
  users: []
}

const getters = {
  allUsers: state => state.users
}

const actions = {
  addNewUser({commit}, user) {
    commit('ADD_USER', user)
  }
}

const mutations = {
  ADD_USER(state, user) {
    state.users.push(user)
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}