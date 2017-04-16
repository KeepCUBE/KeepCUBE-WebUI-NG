<template>
    <div id="operations">

        <div v-timeliner >Timeliner</div>

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
