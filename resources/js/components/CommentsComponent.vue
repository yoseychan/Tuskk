<template>
    <div class="row">
        <div class="comment-article-body comment" v-if="comments.length === 0">
            <div class="first-comment">
                <p > Be the first one to comment on this post!</p>
            </div>
        </div>
        <div class="row comment" v-else v-for="comment in comments">
            <div class="comment-article-body">
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
            EventBus.$on('comment-submitted', (comment) => {
                this.comments.unshift(comment);
            });
        },
        methods: {
            relativeDate(dt) {
                return moment(dt).fromNow();
            }
        },
    }
</script>



