<template>
    <div id="operations">
        <div id="on">On</div>
        <div id="off">Off</div>
        <div id="toggle">Toggle</div>
    </div>
</template>
<style>

    #operations {
        display:flex;
        flex-direction: row;
        justify-content: space-around;
    }
    #operations > div {
        width: 4em;
        height: 4em;
        display:flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

</style>
<script>

    export default{
      props: ['deviceId'],
      data(){
        return{

        }
      },
      created( ) {
        console.log(this.deviceId)
      }
    }
</script>
