<template>
    <div id="operations">
        <div id="power" v-show="!sync">
            <button @click="on" id="on" class="mdl-button power-button">On</button>
            <button @click="off" id="off" class="mdl-button power-button">Off</button>
        </div>
        <hr>
        <div id="sync">
            <button v-show='!sync' class="mdl-button mdl-js-button" @click="sync = !sync">Synchronize</button>
            <sync @synced="sync = false" v-if="sync"></sync>
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
