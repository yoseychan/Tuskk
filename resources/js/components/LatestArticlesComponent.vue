<template>
    <div id="articles">

        <h4 class="section-title">Latest articles</h4>

        <div class="row row-cols-1 row-cols-md-3">

            <div v-for="(article, i) in articles" :key="i">
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
                                <p><span class="material-icons">query_builder</span> {{ relativeDate(article.created_at)}}</p>
                                <p><span class="material-icons">chat_bubble_outline</span> {{ article.comments.length }}</p>
                                <p><span class="material-icons">favorite_border</span> 3hc</p>
                                <p><span class="material-icons">bookmark_outline</span> {{ article.category.title }}
                                </p>
                            </div>

                            <div class="card-text ">
                                <p class="card-excerpt">{{ article.excerpt }}</p>
                                <p class="card-author">By <a :href="'users/' + article.user.id" class="author">{{ article.user.name }}</a></p>
                                <div class="card-tags" v-for="(tag, j) in article.tags" :key="j">
                                    <span class="accent">#</span><a href="#">{{ tag.title }}</a>
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
            axios.get('/api/articles/latest').then((response) => {
                this.articles = response.data;
            });
        },
         methods: {
             relativeDate(dt) {
                return moment(dt).fromNow();
            },
        }
    }
</script>
