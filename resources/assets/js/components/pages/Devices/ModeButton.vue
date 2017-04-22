<template>
    <button class="mdl-button mdl-js-button mdl-button--icon" :id="button[mode].cssId" :disabled="button[mode].title != 'All'">
        <i class="material-icons">{{ button[mode].icon }}</i>
        <div class="mdl-tooltip mdl-tooltip--large" :for="button[mode].cssId">
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
