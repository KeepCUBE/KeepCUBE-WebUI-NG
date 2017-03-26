<template>
    <div id="dashboard">
        <div class="operation-bar">
            <label v-mdl class="mdl-icon-toggle mdl-js-icon-toggle" for="icon-toggle-1">
                <input type="checkbox" id="icon-toggle-1" class="mdl-icon-toggle__input" v-model="editMode">
                <i class="mdl-icon-toggle__label material-icons">build</i>
            </label>
        </div>

        <div class="mdl-grid">
            <div v-for="(homeCard, index) in homeCards" class="mdl-cell mdl-cell--4-col mdl-card">
                <div class="mdl-card__title">{{ homeCard.title }}</div>
                <div class="mdl-card__title">{{ homeCard.time }}</div>

                <div v-if="editMode" class="mdl-card__operation-column">
                    <button @click="removeHomeCard(index)" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
                        <i class="material-icons">clear</i>
                    </button>
                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
                        <i class="material-icons">settings</i>
                    </button>
                </div>
            </div>
            <div v-if="editMode" @click="addHomeCard" class="mdl-cell mdl-cell--4-col mdl-card mdl-card--add">
                <i class="material-icons">add</i>
            </div>
        </div>
    </div>
</template>

<style>
#dashboard {
    display:flex;
    flex-direction: column;
    height:100%;
}
.mdl-card {
    align-items: center;
    flex-direction: row;
    justify-content: space-around;
}
.mdl-card--add {
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
.mdl-card--add > i {
    cursor: inherit;
    font-size: 8rem;
    color: #FFF;
    user-select: none;
    -webkit-user-select: none;
}
.mdl-card__operation-column {
    display: flex;
    flex-direction: column;
}

</style>

<script>

    export default{
        data() {
            return {
                editMode: true,
                homeCards: [
                    {
                        title: "text",
                    }
                ],
            }
        },
        methods: {
            addHomeCard: function () {
                this.homeCards.push({
                    title: "Hello! You've just added me! Let's be friends :3",
                    time: Date.now()
                });
            },
            removeHomeCard: function (index) {
                this.homeCards.splice(index,1);
                console.log(this.homeCards);
            }
        },
        components:{
        }
    }
</script>
