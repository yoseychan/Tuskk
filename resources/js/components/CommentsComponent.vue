<template>
    <div class="row justify-content-center ">
        <div class="comment-article-body comment" v-if="comments.length === 0">
            <div class="first-comment">
                 <p> Be the first one to comment on this post!</p>
            </div>
        </div>
         <div v-else class="comment-article-body" v-for="comment in comments">
                <div class="username">
                    <p>{{ comment.user.name }}</p>
                </div>
                <div class="time">
                    <p>{{ relativeDate(comment.created_at) }}</p>
                </div>
                <div class="content">
                    <p>{{ comment.content }}</p>
                </div>
            </div>
    </div>
</template>

<script>
    export default {
        props: ["dataComment"],
        data() {
            return {
                article: [],
                comments: []
            }
        },
        mounted() {
            this.article = JSON.parse(this.dataComment);
            this.comments = this.article.comments;
            console.log(this.comments);
        },
        methods: {
            relativeDate(dt) {
                return moment(dt).fromNow();
            },

        }
    }
</script>



