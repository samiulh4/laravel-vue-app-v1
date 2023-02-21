<template>
    <div class="vue_root_wrapper">
        <Nav/>
        <router-view></router-view><!-- where to place route component-->
        <Footer/>
    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions, mapMutations} from 'vuex';
    import Nav from './partials/Nav.vue';
    import Footer from './partials/Footer.vue';
    //import authMixin from "../authMixin";

    export default {
       // mixins: [authMixin],
        components: {
            Nav, Footer
        },
        computed:{
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
        methods: {
            ...mapActions('currentUser', ['checkAuthTokenExpiration']),
            async isTokenExpiry() {
                try {
                    await this.checkAuthTokenExpiration();
                } catch (error) {
                    console.log('BlogIndex [Error] => '+ error);
                }
            },
        },
        computed: {
            /*currentUser:{
                get(){
                    return this.$store.state.currentUser.user;
                }
            }*/
        },
        created() {
            //this.$store.dispatch('currentUser/getUser');
        },
        mounted() {
            this.isTokenExpiry();
            //console.log(this.authUser2);
        },
        watch: {

        }
    }
</script>
