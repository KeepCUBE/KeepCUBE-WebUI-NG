<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="closeBtn" @click="close"><i class="material-icons">clear</i></div>
                    <slot>
                    </slot>
                </div>
            </div>
        </div>
    </transition>
</template>
<style>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 90%;
        margin: 0px auto;
        padding: 16px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    .closeBtn {
        cursor: pointer;
    }
</style>
<script>
    export default {
        methods: {
            close() {
                this.$bus.emit('modal-close');
                console.log('closed');
            },
        },
        created() {
            this.$bus.emit('modal-open');
            this.$bus.once('esc-press', this.close);
        },
    }
</script>
