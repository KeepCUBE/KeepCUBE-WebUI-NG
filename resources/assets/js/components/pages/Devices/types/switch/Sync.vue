<template>
    <div>
        <div v-if="syncStep == 'on'">
            <div class="desc"><b>"On"</b> code has been generated and is being sent. Turn on configuration mode at your switch please.</div>
            <div class="desc">Click the button right after the switch is configured.</div>
            <button class="mdl-button mdl-js-button" @click="onSynced">On Synchronized</button>
        </div>
        <div v-if="syncStep == 'off'">
            <div class="desc"><b>"Off"</b> code has been generated and is being sent. Turn on configuration mode at your switch please.</div>
            <div class="desc">Click the button right after the switch is configured.</div>
            <button class="mdl-button mdl-js-button" @click="offSynced">Off Synchronized</button>
        </div>
    </div>
</template>
<style>

</style>
<script>

    export default{
      props: ['deviceId'],
      data(){
        return{
          syncStep: 'on'
        }
      },
      methods: {
        onSynced() {
          this.syncStep = 'off'
        },
        offSynced() {
          this.$emit('synced')
        }
      }
    }
</script>
