<template>
    <div class="hero featured">
        <div class="hero-img hero-img-featured">
            <img
                :src="article.image"
                alt="">
            <div class="text-article text-article-featured">
                <a class="accent category" :href="'/categories/' + article.category.title">{{ article.category.title
                    }}</a>
                <h1 class="title">{{ article.title }}</h1>
                <div class="card-details">
                    <div><span class="material-icons">query_builder</span>{{ relativeDate(article.created_at) }}</div>
                    <div><span class="material-icons">chat_bubble_outline</span>{{ article.comments.length }}</div>
                    <div class="pointer" @click="like(article.id)">
                        <span v-if="article.if_i_liked" class="material-icons accent">favorite_border</span>
                        <span v-else class="material-icons">favorite_border</span>
                        {{ article.likes_count }}
                    </div>
                </div>
                <div class="feature-link">
                    <div class="fl-left"><a :href="/articles/ + article.id">Read more</a></div>
                    <div class="fl-right"><a :href="/categories/ + article.category.title">More {{
                        article.category.title }} news</a></div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        data() {
            return {
                article: {
                    image: "",
                    category: {
                        title: ""
                    },
                    title: "",
                    comments: [],
                    user: {
                        id: "",
                        name: ""
                    },
                }
            }
        },
        mounted() {
            axios.get('/api/article/featured').then((response) => {
                this.article = response.data;
            })
        },
        methods: {
            relativeDate(dt) {
                return moment(dt).fromNow();
            },
            like(id) {
                axios.post('api/articles/like', {id: id}).then((response) => {
                    this.article.if_i_liked = (response.data.if_i_liked == '1') ? true : false;
                    this.article.likes_count = parseInt(response.data.likes_count);
                    // window.location.href= "/home";
                })
            }
        }

    }

</script>
