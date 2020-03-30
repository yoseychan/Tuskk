<template>
    <div>

        <h2>Latest articles</h2>

        <div class="row row-cols-1 row-cols-md-3">

            <div v-for="(article, i) in articles" :key="i">
                <div class="col mb-4 ">
                    <div class="card text-center">
                        <img class="card-img-top" v-bind:src="article.image" alt=" "/>
                        <div class="card-body">

                            <div class="card-title">
                                <h4>
                                    {{ article.title }} {{ article.id }}
                                </h4>
                            </div>

                            <div>Created at: {{ article.created_at }}</div>
                            <div>Cmts: {{ article.comments.length }} cat: {{ article.category.title }}</div>

                            <div class="card-text">
                                <p>{{ article.body }}</p>
                                <p>Written by {{ article.user.name }} </p>
                                <div v-for="(tag, j) in article.tags" :key="j">
                                    #<a href="#">{{ tag.title }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                articles: [],
            }
        },
        mounted() {
            axios.get('/api/articles').then((response) => {
                this.articles = response.data.slice(0, 3);
            });
        },
        computed: {}
    }
</script>
