<template>
    <div>
        <div class="hero featured ">
            <div class="hero-img hero-img-article">
                <img
                    :src="article.image"
                    alt="">
                <div class="text-article text-article-single">
                    <a class="accent category" :href="'/categories/' + article.category.title"> {{ article.category.title }}</a>
                    <h1 class="title"> {{ article.title }}</h1>
                    <div class="card-details">
                        <div><span class="material-icons">query_builder</span>{{ relativeDate(article.created_at)  }}</div>
                        <div><span class="material-icons">chat_bubble_outline</span>{{ article.comments.length }}</div>
                        <div class="pointer" @click="like(article.id)">
                            <span v-if="article.if_i_liked" class="material-icons accent">favorite_border</span>
                            <span v-else class="material-icons">favorite_border</span>
                            {{ article.likes_count }}
                       </div>
                    </div>
                    <div class="card-author-article">
                        <p class="card-author">By <a :href="'/users/' + article.user.id" class="author">{{article.user.name
                            }}</a> on {{ relativeDateTwo(article.created_at) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="body-article ">
                <p>{{ article.body}}</p>
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
            like(id) {
                axios.post('/api/articles/like', {id: id}).then((response) => {
                    this.article.if_i_liked = (response.data.if_i_liked == '1') ? true : false;
                    this.article.likes_count = parseInt(response.data.likes_count);
                })
            }

        }
    }

</script>
