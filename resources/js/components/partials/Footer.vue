<template>
    <div class="container-fluid" id="footerSection">
        <div class="row">
            <div class="col-md-12">
                <div class="footer_context">
                    <h3>Copyright</h3>
                    <h3>Md.Samiul haque</h3>
                    <h3>Lab Hunter</h3>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
<style>
#footerSection {
    position: relative;
}

#footerSection .footer_context {
    position: fixed;
    z-index: 9999;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    flex-direction: row;
    justify-content: center;
}
</style>
