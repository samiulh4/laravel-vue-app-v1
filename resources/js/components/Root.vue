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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
