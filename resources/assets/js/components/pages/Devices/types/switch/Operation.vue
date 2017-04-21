<template>
    <div id="operations">
        <div id="power" v-if="!sync">
            <button @click="on" id="on" class="mdl-button">On</button>
            <button @click="off" id="off" class="mdl-button">Off</button>
        </div>
        <div id="sync">
            <button class="mdl-button" @click="sync = !sync">Synchronize</button>
            <sync v-if="sync"></sync>
        </div>
    </div>
</template>
<style>

</style>
<script>

    import * as api from '../../../../../api/types/switch/switch'
    import Sync from './Sync.vue'

    export default{
      props: ['deviceId'],
      data(){
        return{
          sync: false
        }
      },
      components: {
        Sync,
      },
      methods: {
        on() {
          api.powerSwitch(this.deviceId, 'on')
        },
        off() {
          api.powerSwitch(this.deviceId, 'off')
        },
      },
      created( ) {

      }
    }
</script>
