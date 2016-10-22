<template>
    <div id="rooms">

        <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-cell mdl-cell--12-col">
            <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Material</th>
                <th>Quantity</th>
                <th>Sumtin</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <td class="mdl-data-table__cell--non-numeric">{{ item.name }}</td>
                <td></td>
                <td>{{ item.actions }}</td>
            </tr>
            </tbody>
        </table>

    </div>
</template>

<style>

</style>

<script>

    export default{
        data(){
            return{
                header:'Rooms',
                items: [
                    {
                        name: 'Světlo v koupelně',
                    },
                    {
                        name: 'Diody na telce'
                    },
                ]
            }
        },
        beforeMount() {

            //this.items[0]['actions'] = 'action'
            this.items.map(function (item) {
                return item['actions'] = 'test'
            })
        },
        components:{
        }
    }
</script>
