<template>
    <div id="sidebar">
        <div class="sidebar-overlay">

            <div class="sidebar-header bg-transparent">
                <a href="/" @click="setRouteName('home')">
                    <img src="images/regilogowit.png" height="30" class="text-center" alt="Tweekracht">
                </a>
            </div>

            <div class="p-3">
                <hr class="bg-white p-0 m-0">
            </div>

            <ul class="p-3">
                <!-- Home -->
                <li class="mb-2" :class="{ active: routeName === 'home' }">
                    <a href="/" @click="setRouteName('home')">
                        <i class="fas fa-home mr-3"></i>Overzicht
                    </a>
                </li>
                <!-- Relations -->
                <li class="mb-2">
                    <a href="#relationsSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-users mr-3"></i>Relaties
                    </a>
                    <ul class="collapse list-unstyled"
                        :class="{show: routeName === 'clients' || routeName === 'companies'}"
                        id="relationsSubMenu">
                        <li class="collapsable-li my-1 ml-auto" :class="{active: routeName === 'clients'}">
                            <a href="/clients" class="py-2" @click="setRouteName('clients')">
                                <i class="fas fa-user mr-3"></i>Clienten
                            </a>
                        </li>
                        <li class="collapsable-li ml-auto" :class="{active: routeName === 'companies'}">
                            <a href="/companies" class="py-2" @click="setRouteName('companies')">
                                <i class="fas fa-building mr-3"></i>Bedrijven
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Reports -->
                <li class="mb-2" :class="{active: routeName === 'reports'}">
                    <a href="/reports" @click="setRouteName('reports')">
                        <i class="fas fa-gem mr-3"></i>Rapporten
                    </a>
                </li>
                <!-- Maintain -->

                <li class="mb-2" v-if="isAdmin">
                    <a href="#maintainSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-crown mr-3"></i>Beheer
                    </a>
                    <ul class="collapse list-unstyled"
                        :class="{show: routeName === 'users'}"
                        id="maintainSubMenu">
                        <li class="collapsable-li my-1 ml-auto" :class="{active: routeName === 'users'}">
                            <a href="/users" class="py-2" @click="setRouteName('users')">
                                <i class="fas fa-users mr-3"></i>Gebruikers
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Information -->
                <li class="mb-2" :class="{ active: routeName === 'information' }" v-if="isAdmin">
                    <a href="/information" @click="setRouteName('information')">
                        <i class="far fa-question-circle mr-3"></i>Informatie
                    </a>
                </li>
                <li class="mb-2">
                    <a href="/logout">
                        <i class="fas fa-sign-out-alt mr-3"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "LayoutSideBar",
    props: {
        logo: String,
        isAdmin: Boolean
    },
    data() {
       return {
           routeName: 'home'
       }
    },
    methods: {
        setRouteName(value) {
            this.routeName = value
        }
    }
}
</script>

<style scoped>

</style>
