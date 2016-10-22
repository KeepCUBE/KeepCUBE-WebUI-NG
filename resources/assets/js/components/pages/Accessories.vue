<template>
    <div id="accessories" class="mdl-grid">
        <div v-for="card in cards" class="mdl-card mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-cell">
            <div class="mdl-card__title">
                 <div class="mdl-card__title-text">{{ card.name }}</div>
            </div>
        </div>
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
        },
        mounted() {
            this.cards.push({
                name: "add",
            });
        }
    }
</script>
