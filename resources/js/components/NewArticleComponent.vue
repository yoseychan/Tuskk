<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 mb-12">
                <div class="">
                    <div class="">
                        <form enctype="multipart/form-data" class="article-form">

                            <input class="form-control mb-6" placeholder="Title"
                                   v-model="form.title"></input>
                            <input class="form-control mb-6" placeholder="Excerpt"
                                   v-model="form.excerpt"></input>
                            <textarea class="form-control mb-1" placeholder="Body"
                                      v-model="form.body"></textarea>
                            <el-upload
                                class="upload-demo"
                                drag
                                action="/api/image/upload"
                                :on-success="handleUpload">
                                <img v-if="form.image" :src="form.image" class="">
                                <div v-else>
                                    <i class="el-icon-upload"></i>
                                    <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
                                    <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 5Mb
                                    </div>
                                </div>
                            </el-upload>

                            <div>
                                <p>Is this a featured article ?</p>
                                <input type="radio" id="yes" value="1" v-model="form.featured">
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" value="0" v-model="form.featured">
                                <label for="no">No</label>
                            </div>


                            <select v-model="form.category_id">
                                <option v-for="(category,index) in categories" :key="index" :value="category.id"> {{
                                    category.title }}
                                </option>
                            </select>
                            <div>
                                <button @click="submitForm()" type="button" class="submitArticle">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        components: {},
        data() {
            return {
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
            }
        },
        methods: {
            handleUpload(result, file) {
                this.form.image = "/storage/" + result.name
            },
            submitForm() {

                axios.post("/api/articles", this.form);
            }
        },
        mounted() {
            axios.get("/api/categories").then((response) => {
                this.categories = response.data;
            })
        }
    }
</script>

