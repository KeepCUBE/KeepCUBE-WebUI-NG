import * as api from '../../api/devices'

const state = {
  devices: [],
  newDevice: {
    name: '',
    type_id: null
  }
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
    if(state.newDevice.name && state.newDevice.type_id) {
      api.postNewDevice(state.newDevice, newDevice => {
        commit('ADD_DEVICE', newDevice)
      })
    }
  },
  removeDevice({ commit }, key) {
    api.deleteDevice(state.devices[key], key => {
      commit('REMOVE_DEVICE', key)
    })
  }
}

const mutations = {
  SET_DEVICES(state, {devices}) {
    let reindexedDevices = {}
    devices.forEach((item) => {
     reindexedDevices[item.id] = item
    })
    state.devices = reindexedDevices
  },
  ADD_DEVICE(state, device) {
    state.devices[device.id] = (device)
  },
  REMOVE_DEVICE(state, key) {
    delete state.devices[key]
  },
  UPDATE_NEW_DEVICE(state, information) {
    state.newDevice = Object.assign(state.newDevice, information)
  },
}

export default {
  state,
  getters,
  actions,
  mutations
}