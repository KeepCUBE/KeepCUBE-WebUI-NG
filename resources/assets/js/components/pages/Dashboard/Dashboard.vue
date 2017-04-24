<template>
    <div id="dashboard">
        <div class="operation-bar">
            <label v-mdl class="mdl-icon-toggle mdl-js-icon-toggle" for="icon-toggle-1">
                <input type="checkbox" id="icon-toggle-1" class="mdl-icon-toggle__input" v-model="editMode">
                <i class="mdl-icon-toggle__label material-icons">build</i>
            </label>
        </div>
        <div class="mdl-grid">
            <div class="sense-item mdl-cell mdl-cell--4-col">
                <i class="material-icons">whatshot</i>
                <span>22 °C</span>
            </div>
            <div class="sense-item mdl-cell mdl-cell--4-col">
                <i class="material-icons">spa</i>
                <span>70 %</span>
            </div>
        </div>
        <div class="mdl-grid">
            <div class="mdl-textfield mdl-js-textfield mdl-cell--12-col mdl-cell" v-mdl>
                <input class="mdl-textfield__input"  v-model="name" type="text" id="device_name">
                <label class="mdl-textfield__label" for="device_name">#DSC</label>
            </div>
            <button @click="sendCustomCode" v-model="customCode" class="mdl-button">Send</button>
        </div>
        <div class="mdl-grid">
            <card v-for="(card, index) in cards" :card="card"></card>
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
.sense-item {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction:column;
}
.sense-item * {
    padding: .1em;
}
.sense-item i {
    font-size: 10em;
}
.sense-item span {
    font-size: 4em;
}


</style>

<script>

    import Card from './Card.vue'
    import * as api from '../../../api/actions'

    export default{
        data() {
            return {
                editMode: false,
              customCode: ''
            }
        },
      computed: {
        cards() {
          return this.$store.getters.allCards;
        }
      },
        methods: {
            addHomeCard: function () {
              this.$store.dispatch('addCard')
            },
            removeHomeCard: function (index) {
                this.homeCards.splice(index,1);
                console.log(this.homeCards);
            },
          sendCustomCode() {
            api.customCmd(this.customCode)
          }
        },
        components:{
          Card
        }
    }
</script>
