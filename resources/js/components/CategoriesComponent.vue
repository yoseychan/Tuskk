<template>
    <div class="container-xl main ">
        <h1 class="title-articles categories">Categories</h1>
        <div class="row justify-content-center btn-space" v-for="category in categories">
            <a :href="/categories/ + category.title" class="brk-btn">{{ category.title }}</a>
        </div>

    </div>
</template>

<script>
    export default {

        data() {
            return {
                categories: {}
            }
        },
        mounted() {
            axios.get('api/categories').then((response) => {
                this.categories = response.data;
            })
        },
    }

</script>
