<template>
    <div>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
            <div class="mdl-layout__drawer">
                <div class="mdl-layout-logo"><img src="/imgs/layout/logo.svg"></div>
                <navigation></navigation>
            </div>
            <main class="mdl-layout__content">
                <div class="page-content">
                    <router-view></router-view>
                </div>
            </main>
        </div>
    </div>
</template>

<style>
    .page-content {
        padding: 1em 4em;
    }
    .page-content > div {
        display: flex;
    }
    img path {
        fill: #ffffff;
    }
</style>

<script>
    import navigation from './Navigation.vue'

    export default{
        data(){
            return{
                header: ''
            }
        },
        components:{
            navigation,
        },
    }
</script>
