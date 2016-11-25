<template>
    <div id="dashboard">

        <div>{{ result }}</div>
        <br>
        <br>
        <div>
            <textarea id="result" v-on:keydown="keycuts($event)" v-on:keyup="rethink()"></textarea>
        </div>

    </div>
</template>

<style>
#dashboard {
    display:flex;
    flex-direction: column;
    height:100%;
}
textarea {
    padding: 2em;
    box-sizing: border-box;
    height: 700px;
    width: 100%;
}
</style>

<script>

    export default{
        data() {
            return {
                result: "Result here!"
            }
        },
        methods: {
            keycuts: function (e) {
                if(e.key == "Tab") {
                    console.log(e.key);
                    e.preventDefault();
                }
            },
            rethink: function (e) {

                const code = document.getElementById('result').value;
                const functionWrap = "function returnedVal() {" + code + "}return 'sf'";

                const something = eval(code);
                this.result = something;
                console.log(something);
            }
        },
        mounted() {
        },
        components:{
        }
    }
</script>
