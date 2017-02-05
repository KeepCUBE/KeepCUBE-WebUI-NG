import * as api from '../../api/devices'

const state = {
  devices: []
}

const getters = {
  allDevices: state => state.devices,
}

const actions = {
  getDevicesFromApi({ commit }) {
    api.getAllDevices(devices => {
      commit('setDevices', {devices})
    })
  }
}

const mutations = {
  setDevices(state, {devices}) {
    state.devices = devices
  },
  addDevice(state, {device}) {
    state.devices.push(device)
  },
  removeDevice(state, {id}) {
    delete state.devices[id]
  },
}

export default {
  state,
  getters,
  actions,
  mutations
}