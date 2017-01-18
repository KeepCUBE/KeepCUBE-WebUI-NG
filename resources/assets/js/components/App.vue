<template>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
        <!--<div class="modal-wrapper"><div class="modal-container"><div class="closeBtn"><i class="material-icons">clear</i></div> </div></div>-->
        <div class="mdl-layout__drawer"
            :class="{pushback: modal}">
            <div class="mdl-layout-logo"><img src="/imgs/layout/logo.svg"></div>
            <navigation></navigation>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                <h1 class="mdl-typography--text-capitalize">{{ header }}</h1>
                <router-view></router-view>
            </div>
        </main>
    </div>
</template>

<style>
    .page-content {
        padding: 1em 4em;
    }
    .pushback {
        z-index: 1;
    }
</style>

<script>
    import navigation from './Navigation.vue'

    export default{
        data() {
            return {
                modal: false,
            };
        },
        components:{
            navigation,
        },
        computed: {
            header: function() {
                return this.$route.name
            }
        },
        created() {
            this.$bus.on('modal-close', () => {this.modal = false});
            this.$bus.on('modal-open', () => {this.modal = true});
        }

    }
</script>
