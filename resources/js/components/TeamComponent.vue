<template>
    <div>
        <h4 class="section-title">Our Team:</h4>

        <div class="row row-cols-1 row-cols-md-3">
            <div v-for="author in authors">
                <div class="col latest ">
                    <div class="card card-latest">
                        <img class="card-img-top cimg" :src="author.avatar" alt=" "/>
                        <div class="card-body">

                            <div class="card-title">
                                <h4>
                                    <a :href="'users/' + author.id">{{ author.name }}</a>
                                </h4>
                            </div>

                            <div class="card-text ">
                                <p class="card-excerpt">Joined: </p>

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
                authors: [],
            }
        },
        mounted() {
            axios.get('/api/users').then((response) => {
                this.authors = response.data;
            });
        },
        methods: {}
    }
</script>
