/**
 * Created by ddos on 22.04.17.
 */
import * as api from '../../api/rooms'

const state = {
  rooms: [],
  newRoomData: {
    name: ''
  }
}

const getters = {
  allRooms: state => state.rooms,
  newRoomData: state => state.newRoomData
}

const actions = {
  getRoomsFromApi({ commit }) {
    api.getAllRooms(rooms => {
      commit('SET_ROOMS', {rooms})
    })
  },
  createRoom({ commit }, room) {
    api.createRoom(room , room => {
      commit('ADD_ROOM', room)
    })
  },
  newRoomSetAttr({ commit }, {attr, val}) {
    if(attr in state.newRoomData) {
      commit('UPDATE_NEW_ROOM',  { [attr]: val })
    }
  },
  newRoomSplash({ commit }) {
    if(state.newRoomData.name) {
      api.createRoom(state.newRoomData, room => {
        commit('ADD_ROOM', room)
      })
    }
  },
  removeRoom({ commit }, id) {
    api.deleteRoom(id, id => {
      commit('REMOVE_ROOM', id)
    })
  }
}

const mutations = {
  SET_ROOMS(state, {rooms}) {
    let reindexed = {}
    rooms.forEach((item) => {
      reindexed[item.id] = item
    })
    state.rooms = reindexed
  },
  ADD_ROOM(state, room) {
    Vue.set(state.rooms, room.id, room)
    state.newRoomData = {name: ''}
  },
  REMOVE_ROOM(state, id) {
    Vue.delete(state.rooms, id)
  },
  UPDATE_NEW_ROOM(state, information) {
    state.newRoomData = Object.assign(state.newRoomData, information)
  },
};

export default {
  state,
  getters,
  actions,
  mutations
}