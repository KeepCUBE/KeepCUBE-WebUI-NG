<template>
    <button class="mdl-button mdl-js-button mdl-button--icon" v-bind:id="button[mode].cssId">
        <i class="material-icons">{{ button[mode].icon }}</i>
        <div class="mdl-tooltip mdl-tooltip--large" v-bind:for="button[mode].cssId">
            {{ button[mode].title }}
        </div>
    </button>
</template>

<script>

    export default{
        data(){
            return{
                button: [
                    {
                        icon: 'view_module',
                        title: 'Types',
                        cssId: 'layout-type'
                    },
                    {
                        icon: 'view_quilt',
                        title: 'Groups',
                        cssId: 'layout-groups'
                    },
                    {
                        icon: 'view_list',
                        title: 'All',
                        cssId: 'layout-list'
                    },
                ]
            }
        },
        props: ['mode'],
    }
</script>
