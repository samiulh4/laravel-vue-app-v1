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
            currentUser:{
                get(){
                    console.log(this.$store.state.currentUser.user);
                    return this.$store.state.currentUser.user;
                }
            }
        },
        created() {
            axios.defaults.headers.common["Authorization"] = "Bearer "+ localStorage.getItem('access_token');
            this.$store.dispatch('currentUser/getUser');
        },
        mounted() {
            //console.log('Root Component Mounted.')
           // console.log('Root =>',axios.defaults.headers.common["Authorization"]);
            //console.log(this.$store.state.currentUser.user);
        }
    }
</script>
