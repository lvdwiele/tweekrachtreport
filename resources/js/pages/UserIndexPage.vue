<template>
    <div class="panel bg-white p-4 shadow-sm">
        <div class="row mb-2">
            <div class="col-auto mr-auto">
                <h3>{{ users.length }} gebruikers gevonden</h3>
            </div>
            <div class="col-auto">
                <a href="/users/create"
                   class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus mr-2"></i>Gebruiker
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="dataTable" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Aantal rapporten</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="clickable-row" v-for="user in users" :data-user=`/users/${user.id}`>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.role.name</td>
                        <td>{{ user.reportsCount }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "UserIndexPage",
    data() {
        return {
            users: []
        }
    },
    methods: {
        handleRowClick(value) {
            window.location = `/users/${value.id}`;
        }
    },
    mounted() {
        axios.get('/api/users/all')
            .then((response) => {
                this.users = response;
            })
            .catch((error) => {

            });
    }
}
</script>

<style scoped>

</style>
