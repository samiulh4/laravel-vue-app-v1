<template>
    <div class="container-fluid content_wrapper">
        <div class="row">
            <div class="col-md-8 offset-md-4 mx-auto">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="text-center text-success">Signin</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="login()">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" v-model="user.email"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" v-model="user.password"/>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                        </form>
                        <hr/>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <a href="#" class="btn btn-danger btn-block">Login with Google</a>
                                <a href="#" class="btn btn-primary btn-block">Login with Facebook</a>
                                <a href="#" class="btn btn-dark btn-block">Login with Github</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                user: {
                    email: '',
                    password: ''
                }
            }
        },
        methods: {
            login() {
                this.$store.dispatch('currentUser/loginUser', this.user);
            }
        },
        mounted() {
        }
    }
</script>
