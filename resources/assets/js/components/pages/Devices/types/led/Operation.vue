<template>
    <div id="operations">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--6-col">
                <div id="ledboard">
                    <!--<div id="timeliner" v-timeliner ></div>-->
                    <label for="ledColor" :style="{backgroundColor: ledColor}" class="mdl-colorpicker">
                        <input type="color" v-model="ledColor" id="ledColor">
                    </label>
                    <!--<div :style="{backgroundColor: ledColor}" class="led"></div>-->
                </div>
                <div id="power">
                    <button @click="on" class="mdl-button power-button">On</button>
                    <button @click="off" class="mdl-button power-button">Off</button>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--6-col">
                <button @click="animate(1)" class="mdl-cell--12-col mdl-cell action-preset mdl-button">Animation 1</button>
                <button @click="animate(2)" class="mdl-cell--12-col mdl-cell action-preset mdl-button">Animation 2</button>
                <button @click="animate(3)" class="mdl-cell--12-col mdl-cell action-preset mdl-button">Animation 3</button>
            </div>
        </div>
    </div>
</template>
<style>
    #operations {
        display:flex;
        flex-direction: column;
        justify-content: space-around;
    }
    #operations #ledboard, #power {
        width: 100%;
        height: 16em;
        display:flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
    }
    #operations #power {
        justify-content: center;
        align-items: flex-start;
    }
    .led {
        width: 4em;
        height:4em;
        background-color: black;
        border-radius: 50%;
    }
    .action-preset {
        background-color: gainsboro;
        height: 4rem;
    }

</style>
<script>

    import * as api from '../../../../../api/types/led/led'

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
        off() {
          console.log('Calling API')
          api.sendLedConf({color: '#000000'})
        },
        on(){
          console.log('Calling API')
          api.sendLedConf({color: this.ledColor})
        },
        animate(i){
          switch (i){
            case 1:
              api.sendLedConf({color: '#ff0000'},{color: '#00ff00'},{color: '#0000ff'},{color: '#ffffff'})
              break
            case 2:
              api.sendLedConf({color: '#f0f0f0', time:500},{color: '#ff00ff', time:500},{color: '#ffff00', time:500},{color: '#636363', time:500})
              break
            case 3:
              api.sendLedConf({color: '#ff0000', time:250},{color: '#00ff00', time:2000},{color: '#0000ff', time:500},{color: '#ffffff', time:50})
              break
          }
        }
      },
      beforeDestroy() {

      }

    }
</script>
