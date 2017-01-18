import api from '../../api/accessories';

const state = {
    accessories: [],
};

const getters = {
    allAccessories: state => state.accessories,
};

const actions = {
    getAccessoriesFromApi({ commit }) {
        api.getAccessories(accessories => {
            commit('setAccessories', {accessories});
        });
    }
};

const mutations = {
    setAccessories(state, {accessories}) {
        state.accessories = accessories;
    },
    addAccessory(state, {accessory}) {
        state.accessories.push(accessory);
    },
    removeAccessory(state, {id}) {
        delete state.accessories[id];
    },
};

export default {
    state,
    getters,
    actions,
    mutations
}