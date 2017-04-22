<template>
    <div id="accessories">
        <transition name="modal">
            <new-device v-if="visibleModal == 'new'"></new-device>
            <device-modal v-bind:deviceId="openedDeviceId" v-if="visibleModal == 'detail'"></device-modal>
        </transition>
        <div class="operation-bar">
            <mode-button v-for="(value, mode) in 3" v-on:click.native="changeMode(mode)" v-bind:mode="mode"></mode-button>
        </div>
        <div class="mdl-grid mdl-grid--no-spacing">
            <template v-if="mode == '0'">
                <div v-for="type in types" class="mdl-card mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-cell">
                    <div class="mdl-card__title">
                        <div class="mdl-card__title-text">{{ type.name }}</div>
                    </div>
                </div>
            </template>
            <template v-if="mode == '1'">
                <div v-for="group in groups" class="mdl-card mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-cell">
                    <div class="mdl-card__title">
                        <div class="mdl-card__title-text">{{ group.name }}</div>
                    </div>
                </div>
            </template>
            <template v-if="mode == '2'">
                <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col devices-list">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Remove</th>
                            <th class="mdl-data-table__cell--non-numeric">Name</th>
                            <th>Type</th>
                            <th>Groups</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(device, index) in devices" @click="showDetail(index)">
                            <td class="mdl-data-table__cell--non-numeric">
                                <div @click="remove(index)" class="mdl-button mdl-js-button ">
                                    Remove
                                </div>
                            </td>
                            <td class="mdl-data-table__cell--non-numeric">{{ device.name }}</td>
                            <td>{{ types[device.type_id].name }}</td>
                            <td>
                                <span v-for="group in findGroupsByIds(device.groups)">{{ group.name }}, </span>
                            </td>
                        </tr>
                        <tr @click="newDevice()">
                            <td colspan="10">
                                <div style="display: flex; justify-content: center">
                                    <i class="material-icons">add</i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </template>
        </div>
    </div>
</template>

<style>
    .devices-list th:first-child {
        width: 20px;
    }
</style>

<script>
    import DeviceModal from './DeviceModal.vue'
    import ModeButton from './ModeButton.vue'
    import NewDevice from './NewDevice/NewDevice.vue'
    export default{
        data(){
            return{
              visibleModal: 0,
              mode: 2, //mode of view [0 = types, 1 = groups, 2 = all]
              openedDeviceId: null,
            }
        },
        methods: {
            changeMode: function (mode) {
                this.mode = mode
            },
            findTypeById(id) {
              //TODO: fucking delete this method and make it logical
                let filteredType = this.types.filter((type) => {
                  return type.id == id
                });

                if(filteredType && filteredType.length === 1) {
                  return filteredType[0]
                } else {
                  return false
                }
            },
            findGroupsByIds(ids = []) {

                let filteredGroups = []

                for(let i = 0; i < ids.length; i++) {
                    let filteredGroup = this.groups.filter(function (group) {
                        return group.id == ids[i]
                    })

                    if(filteredGroup && filteredGroup.length === 1) {
                        filteredGroups.push(filteredGroup[0])
                    }
                }

                return filteredGroups
            },
            showDetail(deviceId) {
              this.visibleModal = "detail"
              this.openedDeviceId = deviceId
            },
            newDevice() {
                this.visibleModal = "new"
            },
            closeModal() {
                this.visibleModal = false
            },
          remove(deviceId) {
            this.$store.dispatch('removeDevice', deviceId )
          },
        },
        components: {
          ModeButton,
          DeviceModal,
          NewDevice
        },
        created() {
          if(this.$store.getters.allDevices.length == 0) {
              this.$store.dispatch('getDevicesFromApi')
              this.$store.dispatch('getGroupsFromApi')
              this.$store.dispatch('getTypesFromApi')
            /*setTimeout(console.log(this.devices), 5000)*/

          }
          this.$bus.on('modal-close', this.closeModal)
        },
        destroyed() {
          this.$bus.off('modal-close', this.closeModal)
        },
        computed: {
            devices() {
                return this.$store.getters.allDevices
            },
            types() {
                return this.$store.getters.allTypes
            },
            groups() {
                return this.$store.getters.allGroups
            }
        },
    }
</script>
