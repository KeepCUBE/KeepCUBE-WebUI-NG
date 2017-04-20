<template>
    <div id="operations">
        <div id="ledboard">
            <!--<div id="timeliner" v-timeliner ></div>-->
            <input type="color" v-model="ledColor">
            <div :style="{backgroundColor: ledColor}" class="led"></div>
            <button @click="send" class="mdl-button">Send</button>
        </div>
    </div>
</template>
<style>

    #operations {
        display:flex;
        flex-direction: column;
        justify-content: space-around;
    }
    #operations > div {
        width: 100%;
        height: 16em;
        display:flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
    }
    .led {
        width: 4em;
        height:4em;
        background-color: black;
        border-radius: 50%;
    }

</style>
<script>

    import * as api from '../../../../../api/types/switch/switch'

    export default{
      props: ['deviceId'],
      data(){
        return{
            ledColor: '#000000'
        }
      },
      directives: {
/*        timeliner: {
          bind(el, a, vnode) {

            let target = {color:"#000000"};
            if(window.timelinerObject) {
              el.replaceWith(window.timelinerObject.shadowRoot.firstElementChild)
            } else {
              const timeliner = new Timeliner(target, el)
              timeliner.load({"version":"1.6.2", "title":"LED", "layers":[{"name":"color", "values":[]}]})
              window.timelinerObject = el
            }

            function animate() {
              requestAnimationFrame(animate)
              if(target.color == 0) {
                vnode.context.ledColor = '#000'
              } else {
                vnode.context.ledColor = target.color
              }
            }

            animate()

          },
          unbind(el, a, vnode) {

          }
        }*/
      },
      methods: {
        send(){
          console.log('Calling API')
          api.sendLedConf({color: this.ledColor})
        },
      },
      beforeDestroy() {

      }

    }
</script>
