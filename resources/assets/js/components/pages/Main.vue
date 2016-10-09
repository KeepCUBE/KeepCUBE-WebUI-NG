<template>
    <div id="dashboard">
        <h1>Dashboard</h1>
        <div v-for="card in cards" class="mdl-card">{{ card.name }}</div>
    </div>
</template>

<style>

</style>

<script>

    export default{
        data(){
            return{
                cards: [
                    {
                        name: "card1"
                    },
                    {
                        name: "card2"
                    },
                    {
                        name: "card3"
                    },
                    {
                        name: "card4"
                    },
                    {
                        name: "card5"
                    }
                ],
            }
        },
        components:{
        }
    }
</script>
