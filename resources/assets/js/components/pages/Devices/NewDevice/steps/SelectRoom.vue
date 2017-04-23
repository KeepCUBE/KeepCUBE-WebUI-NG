<template>
    <div>
        <div class="mdl-grid mdl-grid--no-spacing">
            <div class="desc mdl-cell">Please select the room your device is located in.</div>
        </div>
        <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
            <tbody>
                <tr v-for="(room, index) in rooms" @click="select">
                    <td class="mdl-data-table__cell--non-numeric" :data-id="index" >{{ room.name }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<style>

</style>
<script>

    export default{
      props: ['nextStep'],
      data(){
        return{

        }
      },
      methods: {
        select(e) {
          const val = Number(e.target.dataset.id)
          this.$store.dispatch('newDeviceSetAttr', {attr: 'room_id', val})
          if(this.$store.getters.newDeviceData.room_id == val) {
            this.nextStep()
          }
        }
      },
      computed: {
        rooms() {
          return this.$store.getters.allRooms
        }
      }
    }
</script>
