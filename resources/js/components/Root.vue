<template>
    <div class="vue_root_wrapper">
        <Nav/>
        <router-view></router-view><!-- where to place route component-->
        <Footer/>
    </div>
</template>

<script>
import Nav from './partials/Nav.vue';
import Footer from './partials/Footer.vue';
    export default {
        components:{
            Nav,Footer
        },
        computed:{
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

        }
    }
</script>
