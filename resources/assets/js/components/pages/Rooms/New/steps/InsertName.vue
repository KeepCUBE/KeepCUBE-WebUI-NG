<template>
    <div>
        <div class="mdl-grid mdl-grid--no-spacing">
            <div class="mdl-textfield mdl-js-textfield" v-mdl>
                <input class="mdl-textfield__input"  v-model="name" type="text" id="room_name">
                <label class="mdl-textfield__label" for="room_name">Name</label>
            </div>
        </div>
        <button @click="save" class="mdl-button mdl-js-button mdl-button--colored">
            Save
        </button>
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
      save() {
        if(this.$store.getters.newRoomData.name) {
          this.$store.dispatch('newRoomSplash')
          this.$bus.emit('modal-close')
        }
      },
    },
    created() {
      this.$bus.on('enter-press', this.save)
    },
    computed: {
      name: {
        get() {
          return this.$store.getters.newRoomData.name
        },
        set(newValue) {
          this.$store.dispatch('newRoomSetAttr', {attr: 'name', val: newValue})
        }
      }
    },
    beforeDestroy() {
      this.$bus.off('enter-press', this.save)
    }
  }
</script>
