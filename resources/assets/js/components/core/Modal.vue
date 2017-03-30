<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="closeBtn" @click="close"><i class="material-icons">clear</i></div>
                <h2 v-if="title">{{ title }}</h2>
                <slot>
                </slot>
            </div>
        </div>
    </div>
</template>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
        opacity: 0
    }


</style>

<script>
    export default {
      props: ['title'],
      methods: {
        close() {
          this.$bus.emit('modal-close');
        },
      },
      created() {
        this.$bus.emit('modal-open');
        this.$bus.once('esc-press', this.close);
      },
    }
</script>
