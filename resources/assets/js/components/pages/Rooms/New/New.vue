<template>
    <modal :title="title">
        <component :is="steps[currentStep]" :next-step.sync="nextStep"></component>
    </modal>
</template>
<style>

</style>
<script type="text/babel">

  import InsertName from './steps/InsertName.vue'
  import Modal from '../../../core/Modal.vue'

  export default{
    data(){
      return{
        title: 'Add Room',
        steps: ['step-0'],
        currentStep: 0
      }
    },
    components: {
      Modal,
      'step-0': InsertName,

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
