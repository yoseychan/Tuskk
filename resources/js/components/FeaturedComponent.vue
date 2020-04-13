<template>
    <div class="hero featured">
        <div class="hero-img hero-img-featured">
            <img
                :src="article.image"
                alt="">
            <div class="text-article text-article-featured">
                <h5 class="accent category">{{ article.category.title }}</h5>
                <h1 class="title">{{ article.title }}</h1>
                <div class="card-details">
                    <div><span class="material-icons">query_builder</span>{{ relativeDate(article.created_at) }}</div>
                    <div><span class="material-icons">chat_bubble_outline</span>{{ article.comments.length }}</div>
                    <div><span class="material-icons">favorite_border</span>3 likes</div>
                    <div><span class="material-icons">bookmark_outline</span> {{ article.category.title }}</div>
                </div>
                <div class="feature-link">
                    <div class="fl-left"><a :href="/articles/ + article.id" >Read more</a></div>
                    <div class="fl-right"><a :href="/categories/ + article.category.title" >More gaming news</a></div>
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
            }
        }

    }

</script>
