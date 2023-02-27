<template>
    <li class="nav-item" v-if="authLoggedIn == false">
        <router-link :to="{ name: 'SignInForm' }" class="nav-link">Login</router-link>
    </li>
</template>
<script>
    import {mapState, mapGetters, mapActions, mapMutations} from 'vuex';

    export default {
        computed: {
            ...mapState('currentUser', {
                authLoggedIn: state => state.isLoggedIn
            }),
        },
        mounted() {

        }
    }
</script>
