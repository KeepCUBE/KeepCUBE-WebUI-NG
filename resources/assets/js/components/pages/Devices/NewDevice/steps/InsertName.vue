<template>
    <div>
        <div class="mdl-grid mdl-grid--no-spacing">
            <div class="mdl-textfield mdl-js-textfield" v-mdl>
                <input class="mdl-textfield__input"  v-model="name" type="text" id="device_name">
                <label class="mdl-textfield__label" for="device_name">Name</label>
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
        if(this.$store.getters.newDeviceData.name) {
          this.$store.dispatch('newDeviceSplash')
          this.$bus.emit('modal-close')
        }
      },
    },
    computed: {
      name: {
        get() {
          return this.$store.getters.newDeviceData.name
        },
        set(newValue) {
          this.$store.dispatch('newDeviceSetAttr', {attr: 'name', val: newValue})
        }
      }
    },
  }
</script>
