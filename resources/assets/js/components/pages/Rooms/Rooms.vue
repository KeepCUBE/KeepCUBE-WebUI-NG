<template>
    <div id="rooms">
        <transition name="modal">
            <new-room v-if="visibleModal == 'new'"></new-room>
            <!--<device-modal v-bind:deviceId="openedDeviceId" v-if="visibleModal == 'detail'"></device-modal>-->
        </transition>

        <div class="mdl-grid mdl-grid--no-spacing">
            <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Name</th>
                        <th>Number of accessories</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in rooms">
                        <td class="mdl-data-table__cell--non-numeric">
                            <button @click="remove(index)" class="mdl-button mdl-js-button ">
                                Remove
                            </button>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">{{ item.name }}</td>
                        <td></td>
                    </tr>
                    <tr @click="newRoom()">
                        <td colspan="10">
                            <div style="display: flex; justify-content: center">
                                <i class="material-icons">add</i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style>

</style>

<script>

    import NewRoom from './New/New.vue'

    export default{
      data(){
        return{
          header:'Rooms',
          visibleModal: ''
        }
      },
      components:{
        NewRoom,
      },
      created() {
        this.$bus.on('modal-close', this.closeModal)
      },
      computed: {
        rooms() {
          return this.$store.getters.allRooms
        }
      },
      methods: {
        newRoom() {
          this.visibleModal = 'new'
        },
        closeModal() {
          this.visibleModal = ''
        },
        remove(id) {
          this.$store.dispatch('removeRoom', id)
        }
      },
      beforeDestroy() {
        this.$bus.off('modal-close', this.closeModal)
      }
    }
</script>
