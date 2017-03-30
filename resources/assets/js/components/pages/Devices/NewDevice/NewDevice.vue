<template>
    <modal :title="title">
        <component :is="steps[currentStep]" :next-step.sync="nextStep"></component>
    </modal>
</template>
<style>

</style>
<script type="text/babel">

  import SelectType from './steps/SelectType.vue'
  import InsertName from './steps/InsertName.vue'
  import Modal from '../../../core/Modal.vue'

  export default{
    data(){
      return{
        title: 'Add Device',
        steps: ['step-0', 'step-1'],
        currentStep: 0
      }
    },
    components: {
      Modal,
      SelectType,
      'step-0': SelectType,
      'step-1': InsertName,

    },
    methods: {
      nextStep: function() {
        if(this.currentStep >= (this.steps.length - 1)) {
          this.$bus.emit('modal-close')
        } else {
          this.currentStep++;
        }
      }
    }
  }
</script>
