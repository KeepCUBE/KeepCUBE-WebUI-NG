<template>
    <div>
        <div class="desc">"On" code has been generated and is being sent. Turn on configuration mode for your switch please.</div>
        <div class="desc">Click the button right after the switch is configured.</div>
        <button class="mdl-button" @click="offSync">On Synchronized</button>
    </div>
</template>
<style>

</style>
<script>

    export default{
      props: ['deviceId'],
      data(){
        return{

        }
      },
    }
</script>
