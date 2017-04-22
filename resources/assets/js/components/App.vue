<template>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
        <div class="mdl-layout__drawer" :class="{pushback: modal}">
            <div class="mdl-layout-logo"><img src="/imgs/layout/logo.svg"></div>
            <navigation></navigation>
        </div>
        <div aria-expanded="false" role="button" tabindex="0" :class="{pushback: modal}" class="mdl-layout__drawer-button"><i class="material-icons"></i></div>
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
        this.$bus.on('modal-close', () => {
          setTimeout(() => {this.modal = false}, 300)
        })
        this.$bus.on('modal-open', () => {this.modal = true});
      },
      mounted() {
        if(this.$store.getters.allDevices.length == 0) {
          this.$store.dispatch('getDevicesFromApi')
        }
/*
        if(this.$store.getters.allGroups.length == 0) {
          this.$store.dispatch('getGroupsFromApi')
        }
*/
        if(this.$store.getters.allTypes.length == 0) {
          this.$store.dispatch('getTypesFromApi')
        }
        if(this.$store.getters.allRooms.length == 0) {
          this.$store.dispatch('getRoomsFromApi')
        }
      }
    }
</script>
