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
                                <p v-if="user.id == author.id" class="card-articles-category"
                                   @click="deleteArticle(article.id)"><span class="material-icons ">delete_sweep</span>
                                </p>
                                <a v-if="user.id == author.id" class="card-articles-category"
                                   :href="'/articles/' + article.id + '/edit'"><span class="material-icons ">edit</span></a>
                            </div>
                        </div>

                        <div class="card-details">
                            <p><span class="material-icons">query_builder</span> {{ relativeDate(article.created_at) }}
                            </p>
                            <p><span class="material-icons">chat_bubble_outline</span> {{ article.comments.length }}</p>
                            <p><span class="material-icons">chat_bubble_outline</span> {{ article.comments.length }}
                            </p>
                            <p class="pointer" @click="like(article.id, i)">
                                <span v-if="article.if_i_liked" class="material-icons accent">favorite_border</span>
                                <span v-else class="material-icons">favorite_border</span>
                                {{ article.likes_count }}
                            </p>

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
        props: ["dataAuthor", "dataUser"],
        data() {
            return {
                author: [{}],
                articles: [],
                user: {}
            }
        },
        mounted() {
            this.author = JSON.parse(this.dataAuthor);
            this.articles = this.author.articles;

            this.user = JSON.parse(this.dataUser);
            console.log(this.user);
        },
        methods: {
            relativeDate(dt) {
                return moment(dt).fromNow();
            },
            relativeDateTwo(dt) {
                return moment(dt).format('ll');
            },
            deleteArticle($id) {
                axios.delete('/api/articles/' + $id)
                    .then((response) => {
                        window.location.href = '/users/' + this.author.id;
                    })
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
