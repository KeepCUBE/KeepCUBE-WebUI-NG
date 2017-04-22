<template>
    <modal :title="device.name">

        <components :deviceId="deviceId" :is="typeOperations"></components>

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
    }
  }
</script>
