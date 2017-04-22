<template>
    <div id="users">
        <ul>
            <li v-for="user in users">{{ user.name }}</li>
            <li @click="add">Add</li>
        </ul>
    </div>
</template>

<style>

</style>

<script>

    export default{
      data(){
        return{
        }
      },
      components:{

      },
      computed: {
        users() {
          return this.$store.getters.allUsers
        }
      },
      methods: {
        add() {
          this.$store.dispatch('addNewUser', {name: 'RandomString'})
        }
      }
    }
</script>
