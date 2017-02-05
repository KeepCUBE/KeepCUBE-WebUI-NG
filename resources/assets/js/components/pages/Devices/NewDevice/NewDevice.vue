<template>
    <modal :title="title">
        <select-type v-if="step == 1"></select-type>

    </modal>
</template>
<style>

</style>
<script type="text/babel">

  import SelectType from './steps/SelectType.vue'

    import Modal from '../../../core/Modal.vue'

  export default{
    data(){
      return{
        title: 'Add Device',
        step: 1,
      }
    },
    components: {
      Modal,
      SelectType
    }
  }
</script>
