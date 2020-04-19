<template>
    <div class="row justify-content-center">
        <table class="table admin table-hover center">
            <thead class="">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="(user,i) in users" :key="i">
                <th scope="row">{{ user.id }}</th>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.role_id}}</td>
                <td class="admin-btn">
                    <p v-if="loggedUser.role_id == 1 && user.role_id !== 1" class=" action-icon pointer"
                       @click="deleteUser(user.id)">
                        <span class="material-icons">delete_sweep</span>
                    </p>
                    <a class="action-icon" :href="'/admin/users/' + user.id + '/edit'">
                        <span class="material-icons pointer ">create</span>
                    </a>

                </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        props: ["dataUsers", "dataLogged"],
        data() {
            return {
                loggedUser: [],
                users: [],

            }
        },
        mounted() {
            this.users = JSON.parse(this.dataUsers);
            this.loggedUser = JSON.parse(this.dataLogged);

        },
        methods: {

            deleteUser($id) {
                axios.delete('/api/users/' + $id).then((response) => {
                    window.location.href = '/admin/users';
                });
            }
        },
    }
</script>
