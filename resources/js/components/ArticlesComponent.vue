<template>
    <div class="container-xl">
        <div class="spacer"></div>
        <h1 class="section-title title-articles">Articles</h1>
        <div class="card mb-12 card-articles " v-for="(article,i) in articles" :key="i">
            <div class="row no-gutters justify-content-center ">
                <div class="col-md-4 card-img-articles">
                    <img :src="article.image" class="card-img" alt="">
                </div>
                <div class="col-md-8 ">
                    <div class="card-body card-body-articles">

                        <div class="card-title">
                            <h4>
                                <a :href="'/articles/' + article.id">{{ article.title }}</a>
                            </h4>
                            <p class="card-articles-category"><span class="material-icons ">bookmark_outline</span> {{ article.category.title }}</p>
                        </div>

                        <div class="card-details">
                            <p><span class="material-icons">query_builder</span> {{ article.created_at }}</p>
                            <p><span class="material-icons">chat_bubble_outline</span> {{ article.comments.length }}</p>
                            <p><span class="material-icons">favorite_border</span> 3hc</p>

                        </div>

                        <div class="card-text ">
                            <p class="card-excerpt">{{ article.excerpt }}</p>
                            <p class="card-author">By <a :href="'users/' + article.user.id" class="author">{{
                                article.user.name }}</a></p>
                            <div class="card-tags" v-for="(tag, j) in article.tags" :key="j">
                                <span class="accent">#</span><a href="#">{{ tag.title }}</a>
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
                articles: []
            }
        },
        mounted() {
            axios.get('/api/articles').then((response) => {
                this.articles = response.data;
            });
        },
        computed: {}
    }

</script>
