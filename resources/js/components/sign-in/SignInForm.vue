<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-4 mx-auto">
                <div class="card">
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
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
                //this.$swal('Hello Vue world!!!');
            }
        },
        mounted() {
        }
    }
</script>
