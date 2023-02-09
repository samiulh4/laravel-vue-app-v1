<template>
    <div class="container-fluid content_wrapper">
        <div class="row">
            <div class="col-md-3">

            </div><!-- ./col-md-3 -->
            <div class="col-md-6">
                <div class="card my-4" v-if="authLoggedIn == true">
                    <div class="card-body">
                        <button class="btn btn-lg btn-light w-100"  data-toggle="modal" data-target="#articleCreateModal">What's on your mind, {{authUser.name}} ?</button>
                    </div>
                </div>
                <!-- Articles -->
                <div class="card my-4 article_card" v-for="article in articleData" :key="article.id">
                    <div class="card-header">
                        <h4>{{ article.title }}</h4>
                        <h5>{{ article.created_at}}</h5>
                    </div>
                    <img v-bind:src="article.photo" class="card-img-top img-fluid" alt="IMAGE NOT FOUND"/>
                    <div class="card-body">
                        <p class="card-text">{{ article.context }}</p>
                    </div>
                    <div class="card-footer">
                        <p class="float-left">Created By&nbsp;-&nbsp;<span class="text-primary">{{ article.author_name}}</span></p>
                        <a href="#" class="btn btn-sm btn-primary float-right">Details</a>
                    </div>
                </div>
                <!-- Articles -->

            </div><!-- ./col-md-6 -->
            <div class="col-md-3">

            </div><!-- ./col-md-3 -->
        </div><!-- ./row -->


        <!-- start -:- Article Create Modal -->
        <div class="modal fade" id="articleCreateModal" tabindex="-1" aria-labelledby="articleCreateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <form @submit.prevent="saveForm()">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="articleCreateModalLabel">Create Article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            <div class="form-group">
                                <label class="col-form-label">Title</label>
                                <input type="text" v-model="formData.title" class="form-control" placeholder="Enter title here"/>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Context</label>
                                <textarea v-model="formData.context" class="form-control" placeholder="What's on your mind , Sami ?"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Image</label>
                                <input type="file" class="form-control" v-on:change="onFileChange"/>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" v-model="formData.created_by"/>
                        <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end -:- Article Create Modal -->


    </div><!-- ./container -->
</template>
<script>
    import axios from "axios";
    import { mapState, mapGetters, mapActions, mapMutations } from 'vuex';
    import axiosConfig from "../../axiosConfig";
    export default {
        computed: {
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
        data(){
            return{
                articleData:{},
                formData:{
                    title: '',
                    context: '',
                    photo: '',
                    created_by: '',
                }
            }
        },
        created() {
            this.getArticleData();
        },
        methods:{
            getArticleData(){
                axios.get('/api/blog/index').then(response =>{
                    if(response.data.success == true){
                        this.articleData = response.data.articles;
                    }else {
                        alert(response.data.message);
                    }
                }).catch(error =>{
                    alert(error.data.message);
                })
            },
            onFileChange(event) {
                this.formData.photo = event.target.files[0]
            },
            saveForm(){
                let form = new FormData();
                form.append('title',this.formData.title);
                form.append('context',this.formData.context);
                form.append('photo',this.formData.photo);
                axiosConfig.defaults.headers.post['Content-Type'] = 'multipart/form-data';
                axiosConfig.post('/api/blog/store', form)
                    .then(response => {
                        this.articleData.unshift(response.data.article);
                        this.$swal('Success', response.data.message, 'OK');
                    }).catch(error => {
                    this.$swal('Error', error.message, 'OK');
                })
            }
        },
        mounted() {
            //The mounted lifecycle hook is called after the component has been fully rendered
            // and its computed properties have been updated.
            this.formData.created_by = this.authUser.id;
        }
    }
</script>
<style>

</style>
