<template>
    <modal :title="device.name">

        <components v-if="operations" :deviceId="deviceId" :is="typeOperations"></components>

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
        types: [Switch, LED],
        operations: true
      }
    },
    components: {
      Modal,
    },
    computed: {
      device() {
        if(this.deviceId) {
          return this.$store.getters.device(this.deviceId)
        } else {
          this.$bus.emit('modal-close')
          return {name: '', type_id: 0};
        }
      },
      typeOperations() {
        if(this.device.type_id > 0) {
            return this.types[this.device.type_id - 1]
        } else {
          this.operations = false
        }
      }
    },
    methods: {
    }
  }
</script>
