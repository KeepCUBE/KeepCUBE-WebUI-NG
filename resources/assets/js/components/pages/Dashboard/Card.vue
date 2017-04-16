<template>
    <div class="mdl-cell mdl-cell--4-col mdl-card">
        <div class="mdl-card__title">{{ card.title }}</div>
        <div class="power">ON/OFF</div>
    </div>
</template>
<style>
    .mdl-card {
        align-items: center;
        flex-direction: column;
        justify-content: space-around;
        cursor: pointer;
    }
    .mdl-card > .power {
        width: 6em;
        height:6em;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .mdl-card--add {
        justify-content: center;
        align-items: center;
    }
    .mdl-card--add > i {
        cursor: inherit;
        font-size: 8rem;
        color: #FFF;
        user-select: none;
        -webkit-user-select: none;
    }
    .mdl-card__title {
        font-size: 1.5em;
    }
</style>
<script>

    export default{
      props: ['card'],
      data(){
        return{

        }
      },
    }
</script>
