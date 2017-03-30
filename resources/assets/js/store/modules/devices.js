import * as api from '../../api/devices'

const state = {
  devices: [],
  newDevice: {}
}

const getters = {
  allDevices: state => state.devices,
  newDeviceData: state => state.newDevice
}

const actions = {
  getDevicesFromApi({ commit }) {
    api.getAllDevices(devices => {
      commit('SET_DEVICES', {devices})
    })
  },
  newDeviceSetAttr({ commit }, {attr, val}) {
    commit('UPDATE_NEW_DEVICE', { [attr]: val})
  },
  newDeviceSplash({ commit }) {
    if(state.newDevice.name && state.newDevice.type) {
      if(api.postNewDevice(state.newDevice)) {
        commit('ADD_DEVICE', state.newDevice)
        state.newDevice = {}
      }
    }

  }
}

const mutations = {
  SET_DEVICES(state, {devices}) {
    state.devices = devices
  },
  ADD_DEVICE(state, {device}) {
    state.devices.push(device)
  },
  REMOVE_DEVICE(state, {id}) {
    delete state.devices[id]
  },
  UPDATE_NEW_DEVICE(state, information) {
    state.newDevice = Object.assign(state.newDevice, information)
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}