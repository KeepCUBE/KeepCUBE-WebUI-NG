<template>
    <div id="accessories">
        <new-device v-if="visibleModal == 'new'"></new-device>
        <device-modal v-if="visibleModal == 'detail'"></device-modal>
        <div class="operation-bar">
            <mode-button v-for="(value, mode) in 3" v-on:click.native="changeMode(mode)" v-bind:mode="mode"></mode-button>
        </div>
        <div class="mdl-grid mdl-grid--no-spacing">
            <template v-if="mode == '0'">
                <div v-for="type in types" class="mdl-card mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-cell">
                    <div class="mdl-card__title">
                        <div class="mdl-card__title-text">{{ type.title }}</div>
                    </div>
                </div>
            </template>
            <template v-if="mode == '1'">
                <div v-for="group in groups" class="mdl-card mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-cell">
                    <div class="mdl-card__title">
                        <div class="mdl-card__title-text">{{ group.title }}</div>
                    </div>
                </div>
            </template>
            <template v-if="mode == '2'">
                <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Name</th>
                            <th>Type</th>
                            <th>Groups</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="device in devices" @click="showDetail">
                            <td class="mdl-data-table__cell--non-numeric">{{ device.title }}</td>
                            <td>{{ findTypeById(device.typeId).title }}</td>
                            <td>
                                <span v-for="group in findGroupsByIds(device.groups)">{{ group.title }}, </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </template>
        </div>
    </div>
</template>

<script>
    import DeviceModal from './DeviceModal.vue'
    import ModeButton from './ModeButton.vue'
    import NewDevice from './NewDevice/NewDevice.vue'
    export default{
        data(){
            return{
                visibleModal: 'new',
                mode: 2, //mode of view [0 = types, 1 = groups, 2 = all]
                newDevice: true,
            }
        },
        methods: {
            changeMode: function (mode) {
                this.mode = mode
            },
            findTypeById(id) {
                let filteredType = this.types.filter(function (type) {
                    return type.id == id
                });

                if(filteredType.length === 1)
                    return filteredType[0]
                else
                    return false
            },
            findGroupsByIds(ids) {

                let filteredGroups = []

                for(let i = 0; i < ids.length; i++) {
                    let filteredGroup = this.groups.filter(function (group) {
                        return group.id == ids[i]
                    })

                    if(filteredGroup.length === 1) {
                        filteredGroups.push(filteredGroup[0])
                    }
                }

                return filteredGroups
            },
            showDetail() {
                this.visibleModal = "detail"
            },
            newDevice() {
                this.visibleModal = "new"
            },
            closeModal() {
                this.visibleModal = false
            }
        },
        components: {
            ModeButton,
            DeviceModal,
            NewDevice
        },
        created() {
            this.$store.dispatch('getDevicesFromApi')
            this.$store.dispatch('getGroupsFromApi')
            this.$store.dispatch('getTypesFromApi')
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
        }
    }
</script>
