<template>
    <div class="top_navbar_wrapper" id="topNavbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link :to="{ name: 'HomePage' }" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'About' }" class="nav-link">About</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'BlogCreate' }" class="nav-link">Blog</router-link>
                    </li>
                </ul>
                <form class="form-inline navbar_search_form">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                <ul class="navbar-nav ml-auto user_dropdown_menus">
                    <li class="nav-item" v-if="authLoggedIn == false">
                        <router-link :to="{ name: 'SignInForm' }" class="nav-link">Login</router-link>
                    </li>
                    <li class="nav-item dropdown" v-if="authLoggedIn">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-expanded="false">
                            {{ authUser.email }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0);" @click="signOut()">Sign out</a>
                        </div>
                    </li>
                </ul>

            </div>
        </nav>
    </div><!-- #/topNavbar -->
</template>

<script>

    import { mapState, mapGetters, mapActions, mapMutations } from 'vuex';
    export default {
        data: function(){
            return{
                //token: null,
                //isLoggedIn: false,
            }
        },
        computed: {
            //...mapGetters(['currentUser/getToken']),
            /*...mapGetters({
                token: 'currentUser/getToken'
            }),*/
            /*currentUser: {
                get() {
                    return this.$store.state.currentUser;
                }
            },*/
            ...mapState('currentUser', {
                authUser: state => state.user
            }),
            ...mapState('currentUser', {
                authToken: state => state.token
            }),
            ...mapState('currentUser', {
                authLoggedIn: state => state.isLoggedIn
            }),
        },
        created() {
            //this.$store.dispatch('currentUser/getUser');
        },
        methods: {
            signOut() {
                this.$store.dispatch('currentUser/logoutUser');
            }
        },
        mounted() {

        }
    }
</script>
