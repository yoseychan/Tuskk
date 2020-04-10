<template>
    <div class="row">
        <form class="comment-article-body comment-special">
            <p class="alert"> {{ required }} </p>
            <textarea name="content" placeholder="Add a public comment" id="content" type="text"
                      v-model="form.content"  ></textarea>
            <button type="button" @click="submitComment()" >Publish</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ["dataArticle"],
        data() {
            return {
                required: "",
                article: [],
                form: {
                    article_id: "",
                    content: "",
                }
            };
        },
        mounted() {

            this.article = JSON.parse(this.dataArticle);
            this.form.article_id = this.article.id;
        },
        methods: {

            submitComment() {
                if (this.form.content !== "") {
                    this.required = "";
                    axios.post('/api/comments', this.form).then((response) => {
                        EventBus.$emit('comment-submitted', response.data);
                    })
                } else {
                    this.required = "Cannot publish an empty comment!";
                }

            }
        },
    }
</script>
