<template>
    <div>
        <h4 class="section-title"> {{ author.name}}</h4>

    </div>
</template>

<script>
    export default {
        props:["dataAuthor"],
        data() {
            return {
               author: [{
                   name: "",
               }],
            }
        },
        mounted() {
            this.author = JSON.parse(this.dataAuthor);
        },
        methods: {}
    }
</script>
