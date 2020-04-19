<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 mb-12">

                <form enctype="multipart/form-data" class="article-form form-group">

                    <input class="form-control mb-6" placeholder="Title"
                           v-model="form.title"></input>
                    <input class="form-control mb-6" placeholder="Excerpt"
                           v-model="form.excerpt"></input>
                    <textarea class="form-control mb-1 form-control" placeholder="Body"
                              v-model="form.body"></textarea>
                    <el-upload
                        class="upload-demo upload mb-12"
                        drag
                        action="/api/image/upload"
                        :headers="headers"
                        :on-success="handleUpload">
                        <img v-if="form.image" :src="form.image" class="card-img">
                        <div v-else>
                            <i class="el-icon-upload"></i>
                            <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
                            <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 5Mb
                            </div>
                        </div>
                    </el-upload>

                    <div>
                        <p>Choose the article type: </p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="yes" value="1"
                                   v-model="form.featured">
                            <label class="form-check-label" for="yes">Featured</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input" type="radio" id="no" value="0"
                                   v-model="form.featured">
                            <label class="form-check-label" for="no">Classic</label>
                        </div>
                    </div>
                    <p>Choose a category: </p>
                    <select class="form-control col-md-4" v-model="form.category_id">
                        <option v-for="(category,index) in categories" :key="index" :value="category.id"> {{
                            category.title }}
                        </option>
                    </select>
                    <div>
                        <button @click="submitForm()" type="button" class="submitArticle btn upload">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        props: ["dataUser"],
        data() {
            return {
                user: [],
                categories: {
                    title: ""
                },
                form: {
                    title: "",
                    body: "",
                    excerpt: "",
                    image: "",
                    featured: "",
                    category_id: ""
                },
                headers: {'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content},
            }
        },
        methods: {
            handleUpload(result, file) {
                this.form.image = "/storage/" + result.name
            },
            submitForm() {

                axios.post("/api/articles", this.form)
                    .then((response) => {
                        window.location.href = '/users/' + this.user.id;
                    })
            }
        },
        mounted() {
            axios.get("/api/categories").then((response) => {
                this.categories = response.data;
            });
            this.user = JSON.parse(this.dataUser);
        }
    }
</script>

