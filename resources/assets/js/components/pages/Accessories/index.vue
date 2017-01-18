<template>
    <div id="accessories">
        <accessory-modal v-if="visible"></accessory-modal>
        <div class="operation-bar">
            <mode-button v-for="(value, mode) in 3" v-on:click.native="changeMode(mode)" v-bind:mode="mode"></mode-button>
        </div>
        <div class="mdl-grid">
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
                    <tbody>
                    <tr v-for="accessory in accessories" @click="openModal">
                        <td class="mdl-data-table__cell--non-numeric">{{ accessory.title }}</td>
                        <td>{{ findTypeById(accessory.typeId).title }}</td>
                        <td>
                            <span v-for="group in findGroupsByIds(accessory.groups)">{{ group.title }}, </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </template>
        </div>
    </div>
</template>

<script>
    import AccessoryModal from './AccessoryModal.vue';
    import ModeButton from './ModeButton.vue';
    export default{
        data(){
            return{
                visible: false,
                mode: 2, //mode of view [0 = types, 1 = groups, 2 = all]
                types: [
                    {
                        id: 10,
                        title: 'HUE',
                        accessories: [
                            34,
                        ],
                    },
                    {
                        id: 14,
                        title: 'Stepper Motor',
                    },
                ],
                groups: [ //groups shall either include accessories, types and other groups while everything shall be unique
                    {
                        id: 2,
                        title: 'Lights',
                    },
                    {
                        id: 4,
                        title: 'Room 1',
                        accessories: [
                            34,
                            48,
                        ],
                    },
                    {
                        id: 6,
                        title: 'Sunblinds',
                        accessories: [
                            49,
                        ],
                    },
                ],
/*
                accessories: [
                    {
                        id: 34,
                        title: 'Main light in room 1',
                        typeId: 10,
                        groups: [
                            4, //room 1
                            2, //lights
                        ]
                    },
                    {
                        id: 48,
                        title: 'Light above bed in room 1',
                        typeId: 10,
                        groups: [
                            4, //room 1
                            2, //lights
                        ]
                    },
                    {
                        id: 49,
                        title: 'Sunblind in room 1',
                        typeId: 14,
                        groups: [
                            4, //room 1
                            6, //sunblinds
                        ]
                    },
                ]
*/
            }
        },
        methods: {
            changeMode: function (mode) {
                this.mode = mode;
            },
            findTypeById(id) {
                let filteredType = this.types.filter(function (type) {
                    return type.id == id;
                });

                if(filteredType.length === 1)
                    return filteredType[0];
                else
                    return false;
            },
            findGroupsByIds(ids) {

                let filteredGroups = [];

                for(let i = 0; i < ids.length; i++) {
                    let filteredGroup = this.groups.filter(function (group) {
                        return group.id == ids[i];
                    });

                    if(filteredGroup.length === 1)
                        filteredGroups.push(filteredGroup[0]);
                }

                return filteredGroups;
            },
            openModal() {
                this.visible = true;
            },
            closeModal() {
                this.visible = false;
            }
        },
        components:{
            ModeButton,
            AccessoryModal
        },
        created() {
            this.$store.dispatch('getAccessoriesFromApi');
            this.$bus.on('modal-close', this.closeModal);
        },
        destroyed() {
            this.$bus.off('modal-close', this.closeModal);
        },
        computed: {
            accessories() {
                return this.$store.getters.allAccessories;
            }
        }
    }
</script>
