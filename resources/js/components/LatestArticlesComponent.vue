<template>
    <div id="articles main">

        <h4 class="section-title">Latest articles</h4>

        <div class="row row-cols-1 row-cols-md-3">

            <div v-for="(article, index) in articles" :key="index">
                <div class="col latest ">
                    <div class="card card-latest">
                        <img class="card-img-top cimg" v-bind:src="article.image" alt=" "/>
                        <div class="card-body">

                            <div class="card-title">
                                <h4>
                                    <a :href="'/articles/' + article.id">{{ article.title }}</a>
                                </h4>
                            </div>

                            <div class="card-details">
                                <p><span class="material-icons">query_builder</span> {{
                                    relativeDate(article.created_at)}}</p>
                                <p><span class="material-icons">chat_bubble_outline</span>{{ article.comments.length }}
                                </p>
                                <p class="pointer" @click="like(article.id, index)">
                                    <span v-if="article.if_i_liked" class="material-icons accent">favorite_border</span>
                                    <span v-else class="material-icons">favorite_border</span>{{ article.likes_count }}</p>
                                <a :href="'/categories/' + article.category.title"><span class="accent" >#</span>{{ article.category.title }}</a>
                            </div>

                            <div class="card-text ">
                                <p class="card-excerpt">{{ article.excerpt }}</p>
                                <p class="card-author">By <a :href="'users/' + article.user.id" class="author">{{
                                    article.user.name }}</a></p>
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
            axios.get('/api/articles/latest').then((response) => {
                this.articles = response.data;
            });
        },
        methods: {
            relativeDate(dt) {
                return moment(dt).fromNow();
            },
            like(id, index) {
                axios.post('/api/articles/like', {id: id}).then((response) => {
                    this.articles[index].if_i_liked = (response.data.if_i_liked == '1') ? true : false;
                    this.articles[index].likes_count = parseInt(response.data.likes_count);
                })
            }
        }
    }
</script>
