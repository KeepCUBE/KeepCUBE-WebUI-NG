<template>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
        <div class="mdl-layout__drawer">
            <div class="mdl-layout-logo"><img src="/imgs/layout/logo.svg"></div>
            <navigation></navigation>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                <h1 class="mdl-typography--text-capitalize">{{ header }}</h1>
                <h4>{{ motd }}</h4>
                <router-view></router-view>
            </div>
        </main>
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
                motd: ''
            }
        },
        components:{
            navigation,
        },
        computed: {
            header: function() {
                return this.$route.name
            }
        },
        mounted() {
            this.motd = 'This project is jQuery free!!!'
        },
    }
</script>
