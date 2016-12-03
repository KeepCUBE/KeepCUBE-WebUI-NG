<template>
    <nav class="mdl-navigation">
        <router-link v-for="link in links" v-bind:to="link.link" class="mdl-navigation__link">{{ link.title }}</router-link>
    </nav>
</template>

<script>
    const links = [
        {
            'title': "Main Page",
            'link': "/home",
        },
        {
            'title': "Rooms",
            'link': "/rooms",
        },
        {
            'title': "Accessories",
            'link': "/accessories",
        },
        {
            'title': "Users",
            'link': "/users"
        },
    ]


    export default{
        components: {
        },
        data() {
            return {
                "links": links,
            }
        },

    }
</script>

<style>
</style>
