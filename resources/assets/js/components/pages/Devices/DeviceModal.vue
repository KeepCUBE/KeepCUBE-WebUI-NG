<template>
    <modal :title="'Accessory Modal'">

        <h3>{{ device.name }}</h3>

        <components :deviceId="device.id" :is="typeOperations"></components>

        <button @click="remove" class="mdl-button mdl-js-button mdl-button--colored">
            Remove Device
        </button>

    </modal>
</template>

<script>

  import Modal from '../../core/Modal.vue'
  import Switch from './types/switch/Operation.vue'
  import LED from './types/led/Operation.vue'

  export default {
    props: ['deviceId'],
    data() {
      return {
        types: [Switch, LED]
      }
    },
    components: {
      Modal,
    },
    computed: {
      device() {
        return this.$store.getters.device(this.deviceId)
      },
      typeOperations() {
        return this.types[this.device.type_id - 1]
      }
    },
    methods: {
      remove() {
        this.$store.dispatch('removeDevice', this.deviceId )
        this.$bus.emit('modal-close')
      },
    }
  }
</script>
