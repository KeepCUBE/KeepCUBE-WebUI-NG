<template>
    <div>
        <div class="mdl-grid mdl-grid--no-spacing">
            <div class="step-desc mdl-cell">Please select a device type which you want to add.</div>
<!--
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="sample1">
                <label class="mdl-textfield__label" for="sample1">Search</label>
            </div>
            <label class="mdl-textfield__label" for="sample1"></label>
-->
        </div>
        <h3>Stock</h3>
        <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
            <tbody>
            <tr v-for="stock in stocks" @click="select">
                <td class="mdl-data-table__cell--non-numeric" :data-id="stock.id" >{{ stock.name }}</td>
                <td></td>
            </tr>
            </tbody>
        </table>

<!--
        <h3>Custom</h3>
        <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell&#45;&#45;12-col">
            <tbody>
            <tr v-for="custom in customs" @click="showDetail">
                <td class="mdl-data-table__cell&#45;&#45;non-numeric">{{ custom.title }}</td>
                <td></td>
            </tr>
            </tbody>
        </table>
-->

    </div>
</template>
<style>

</style>
<script type="text/babel">

  export default{
    props: ['nextStep'],
    data(){
      return{
      }
    },
    computed: {
      stocks() {
        return this.$store.getters.allTypes
      }
    },
    methods: {
      select(e){
        const val = Number(e.target.dataset.id)
        this.$store.dispatch('newDeviceSetAttr', {attr: 'type_id', val})
        this.nextStep()
      }
    }
  }
</script>
