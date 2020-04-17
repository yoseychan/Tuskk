<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 mb-12">
                <div class="">
                    <div class="">
                        <form class="article-form">

                            <input class="form-control mb-6" placeholder="Name"
                                   v-model="form.name"></input>
                            <input type="email" class="form-control mb-6" placeholder="Email"
                                   v-model="form.email"></input>


                            <select v-model="form.role_id">
                                <option v-for="(role,index) in roles" :key="index" :value="role.id"> {{
                                    role.name }}
                                </option>
                            </select>
                            <div>
                                <button @click="submitForm(form.id)" type="button" class="submit-button">Save</button>
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
        props: ["dataUser", "dataLogged"],
        data() {
            return {
                loggedUser: {},
                roles: [],
                form: {
                    name: "",
                    email: "",
                    role_id: ""
                },
            }
        },
        methods: {
            submitForm($id) {
                axios.put('/api/users/' + $id, this.form)
                    .then((response) => {
                        window.location.href = '/admin/users';
                    });
            }
        },

        mounted() {
            this.form = JSON.parse(this.dataUser);
            this.loggedUser = JSON.parse(this.dataLogged);
            axios.get("/api/roles").then((response) => {
                this.roles = response.data;
            });
        }

    }
</script>

