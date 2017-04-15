##Modal
It's recomended to use Modal.vue as an wrapper for new custom modal component.
It's necesarry to emit and listen for close event since Modal component is designed that way so the developer can manage if the Modal is visible or not however clicking on cross button and listening for Esc is implemented inside the Modal wrapper.
Předělat na bus
```vue
<template>
    <modal @close="close"> //WRAPPER FOR CUSTOM MODAL
        __CUSTOM MODAL CONTENT__
    </modal>
</template>
<style>

</style>
<script>

    import Modal from '../../core/Modal.vue';

    export default{
        components: {
            Modal,
        },
        methods: {
            close() {
                this.$emit('close');
            },
        },
    }
</script>

```
When your custom component is completed. You can simply add it in it's parent component.
```vue
<template>
    <div id="accessories">
        <accessory-modal v-if="visible" @close="visible = false"></accessory-modal>
        <div class="operation-bar">
            <mode-button v-for="(value, mode) in 3" v-on:click.native="changeMode(mode)" v-bind:mode="mode"></mode-button>
        </div>
        <div class="mdl-grid">
            <template v-if="mode == '2'">
                <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
                    <tbody>
                    <tr v-for="accessory in accessories" @click="openModal">
                        <td class="mdl-data-table__cell--non-numeric">{{ accessory.title }}</td>
                        <td>{{ findTypeById(accessory.typeId).title }}</td>
                        <td>
                            <span v-for="group in findGroupsByIds(accessory.groups)">{{ group.title }}, </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </template>
        </div>
    </div>
</template>

<script>
    import AccessoryModal from './AccessoryModal.vue';
    import ModeButton from './ModeButton.vue';
    export default{
        data(){
            return{
                visible: true,
        },
        methods: {
            openModal() {
                this.visible = true;
            },
        },
        components:{
            AccessoryModal
        },
    }
</script>

```