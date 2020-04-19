<template>
    <div class="container-xl main">

        <h1 class="section-title title-articles">{{ category.title }}</h1>

        <div class="card mb-12 card-articles " v-for="(article,i) in articles" :key="i">
            <div class="row no-gutters justify-content-center ">
                <div class="col-md-4 ">
                    <img :src="article.image" class="card-img" alt="">
                </div>
                <div class="col-md-8 ">
                    <div class="card-body card-body-articles">

                        <div class="card-title">
                            <h4>
                                <a :href="'/articles/' + article.id">{{ article.title }}</a>
                            </h4>
                            <a class="card-articles-category pointer"><span class="accent ">#</span>
                               {{ category.title }} </a>
                        </div>


                        <div class="card-details">
                            <p><span class="material-icons">query_builder</span> {{ relativeDate(article.created_at)
                                }}
                            </p>
                            <p><span class="material-icons">chat_bubble_outline</span> {{ article.comments.length }}
                            </p>
                            <p @click="like(article.id, i)" class="pointer">
                            <span v-if="article.if_i_liked" class="material-icons accent">favorite_border</span>
                            <span v-else class="material-icons">favorite_border</span>
                            {{ article.likes_count }}
                        </p>

                        </div>

                        <div class="card-text ">
                            <p class="card-excerpt">{{ article.excerpt }}</p>
                            <p class="card-author">By <a :href="'/users/' + article.user.id" class="author">{{
                                article.user.name }}</a> on {{ relativeDateTwo(article.created_at) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["dataCategory"],
        data() {
            return {
                category: {
                    title: ""
                },
                articles: [
                    {
                        id: "",
                        title: "",
                        comments: [

                        ],
                        user:{
                            id: ""
                        }
                    }
                ]
            }
        },
        mounted() {
            this.category = JSON.parse(this.dataCategory);
            this.articles = this.category.articles;

        },
        methods: {
            relativeDate(dt) {
                return moment(dt).fromNow();
            },
            relativeDateTwo(dt) {
                return moment(dt).format('ll');
            },
            like(id, i) {
                axios.post('/api/articles/like', {id: id}).then((response) => {
                    this.articles[i].if_i_liked = (response.data.if_i_liked == '1') ? true : false;
                    this.articles[i].likes_count = parseInt(response.data.likes_count);
                })
            }

        }
    }

</script>
