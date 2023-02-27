<template>
    <div class="card my-4 vue_user_info_card">
        <div class="card-header">
            <h5 class="text-center">You</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img v-bind:src="authUserProps.photo" class="img-fluid"/>
                </div>
                <div class="col-md-8">
                    <small>{{ authUserProps.name }}</small>
                    <small>{{ authUserProps.email }}</small>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <small>Member Since - {{ authUserProps.created_at }}</small>
        </div>
    </div>
</template>
<script>
    export default {
        props:['authUserProps']
    }
</script>
