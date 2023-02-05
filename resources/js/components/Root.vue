<template>
    <div>
        <Nav/>
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
