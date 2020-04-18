<template>
    <div>
        <h1 class="section-title title-articles"> {{ author.name }}</h1>
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
                            <div class="card-articles-category">
                                <a class="" :href="'/categories/' + article.category.title"><span
                                    class="material-icons ">bookmark_outline</span>
                                    {{ article.category.title }}</a>

                            </div>
                        </div>

                        <div class="card-details">
                            <p><span class="material-icons">query_builder</span> {{ relativeDate(article.created_at) }}
                            </p>
                            <p><span class="material-icons">chat_bubble_outline</span> {{ article.comments.length }}</p>
                            <p><span class="material-icons">favorite_border</span> 3hc</p>

                        </div>

                        <div class="card-text ">
                            <p class="card-excerpt">{{ article.excerpt }}</p>
                            <p class="card-author">Published on {{ relativeDateTwo(article.created_at) }}</p>
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
        props: ["dataAuthor"],
        data() {
            return {
                author: [{}],
                articles: [],
            }
        },
        mounted() {
            this.author = JSON.parse(this.dataAuthor);
            this.articles = this.author.articles;

        },
        methods: {
            relativeDate(dt) {
                return moment(dt).fromNow();
            },
            relativeDateTwo(dt) {
                return moment(dt).format('ll');
            },

        }
    }
</script>
