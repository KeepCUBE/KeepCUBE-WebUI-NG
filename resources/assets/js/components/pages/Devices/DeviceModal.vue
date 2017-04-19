<template>
    <modal :title="'Accessory Modal'">

        <components :deviceId="device.id" :is="typeOperations"></components>

        <button @click="remove" class="mdl-button mdl-js-button mdl-button--colored">
            Smazat
        </button>

    </modal>
</template>

<script>

  import Modal from '../../core/Modal.vue'
  import Switch from './types/switch/Operation.vue'
  import LED from './types/led/Operation.vue'

  export default {
    props: ['device'],
    data() {
      return {
        types: {'switch': Switch, 'led': LED}
      }
    },
    components: {
      Modal,
    },
    computed: {
      typeOperations() {
        return this.types['led']
        //later
        //return this.types[this.device.type]
      }
    },
    methods: {
      remove() {
        this.$store.dispatch('removeDevice', 1 )
      },
    }
  }
</script>
