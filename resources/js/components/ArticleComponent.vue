<template>
    <div>
        <div class="hero featured ">
            <div class="hero-img hero-img-article">
                <img
                    :src="article.image"
                    alt="">
                <div class="text-article text-article-single">
                    <h5 class="accent category"> {{ article.category.title }}</h5>
                    <h1 class="title"> {{ article.title }}</h1>
                    <div class="card-details">
                        <div><span class="material-icons">query_builder</span>{{ relativeDate(article.created_at)  }}</div>
                        <div><span class="material-icons">chat_bubble_outline</span>{{ article.comments.length }}</div>
                        <div><span class="material-icons">favorite_border</span>3 likes</div>
                    </div>
                    <div class="card-author-article">
                        <p class="card-author">By <a :href="'/authors/' + article.user.id" class="author">{{article.user.name
                            }}</a> on {{ relativeDateTwo(article.created_at) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="body-article ">
                <p>{{ article.body}}</p>
                <div class="card-tags" v-for="(tag, j) in article.tags" :key="j">
                    <span class="accent">#</span><a href="#">{{ tag.title }}</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["dataArticle"],
        data() {
            return {
                article: {
                    category: {
                        title: ""
                    },
                    comments: [

                    ],
                    user: {
                        id: "",
                        name: ""
                    }

                }

            }
        },
        mounted() {
            this.article = JSON.parse(this.dataArticle);

        },
        methods: {
             relativeDate(dt) {
               return moment(dt).fromNow()  ;
            },
            relativeDateTwo(dt) {
                return moment(dt).format('ll');
            },

        }
    }

</script>
