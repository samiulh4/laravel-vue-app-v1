<template>
    <div class="container-fluid content_wrapper">
        <div class="row">
            <div class="col-md-3">
                <BlogUserCard v-bind:authUserProps="authUser" v-if="authLoggedIn"/>
            </div><!-- ./col-md-6 (Page Right Section) -->
            <div class="col-md-6">

                <div class="mt-4" v-if="message">
                    <div :class="`alert ${alertType} alert-dismissible fade show`" role="alert">
                        {{ message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>


                <div class="card mt-4" v-if="authLoggedIn == true">
                    <div class="card-body">
                        <button class="btn btn-lg btn-light w-100"  data-toggle="modal" data-target="#articleCreateModal">What's on your mind, {{authUser.name}} ?</button>
                    </div>
                </div>


                <!-- Articles -->
                <div class="card mt-4 article_card" v-for="article in articleData" :key="article.id">
                    <div class="card-header">
                        <h5 class="text-dark">{{ article.title.slice(0, 70) }}... || {{ article.id }}</h5>
                    </div>
                    <img :src="article.photo" class="img-fluid w-100 card-img-top" alt="IMAGE NOT FOUND"/>
                    <div class="card-body">
                        <p class="card-text">{{ article.context.slice(0, 200) }}...</p>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <small class="text-muted">
                                Created By&nbsp;-&nbsp;
                                <a href="#" >{{ article.author_name}}</a>
                                |
                                <span>{{ article.created_at}}</span>
                            </small>
                        </div>
                        <router-link :to="{name: 'BlogDetails', params:{id: article.id}}" class="btn btn-sm btn-dark float-right"><i class="fa fa-circle-info"></i> Details</router-link>
                    </div>
                </div>
                <!-- Articles -->
                <div class="text-center mt-4">
                    <button class="btn btn-md btn-dark" @click="loadMore">Load More</button>
                </div>

            </div><!-- ./col-md-6 (Page Middle Section) -->
            <div class="col-md-3">
                <!-- Search widget-->
                <div class="card mt-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Search widget-->
                <!-- Tags widget-->
                <div class="card mt-4">
                    <div class="card-header">Tags</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!" class="badge badge-dark text-decoration-none link-dark">Web Design</a></li>
                                    <li><a href="#!" class="badge badge-dark text-decoration-none link-dark">HTML</a></li>
                                    <li><a href="#!" class="badge badge-dark text-decoration-none link-dark">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!" class="badge badge-dark text-decoration-none link-dark">JavaScript</a></li>
                                    <li><a href="#!" class="badge badge-dark text-decoration-none link-dark">CSS</a></li>
                                    <li><a href="#!" class="badge badge-dark text-decoration-none link-dark">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tags widget-->





            </div><!-- ./col-md-6 (Page Left Section) -->
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
    import axiosConfig from "../../axiosConfig";
    import BlogUserCard from "./BlogUserCard.vue";
    import { mapState, mapGetters, mapActions, mapMutations } from 'vuex';
    export default {
        components:{
          BlogUserCard,
        },
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
                articleData:[],
                formData:{
                    title: '',
                    context: '',
                    photo: null,
                },
                message: '',
                alertType:'alert-light',
                page: 0,
            }
        },
        created() {
            this.getArticleData();
        },
        methods:{
            getArticleData(page){
                if (typeof page === 'undefined') {
                    page = 0;
                }
                //console.log('page +>',page);
                axios.get('/api/blog/index/'+ page).then(response =>{
                    if(response.data.success == true){
                        //this.articleData = response.data.articles;
                        this.articleData = [...this.articleData, ...response.data.articles];
                        //this.articleData = [...this.articleData, ...Array.from(response.data.articles)];
                        //this.articleData = [...this.articleData, ...Object.values(response.data.articles)];
                        //this.articleData.splice(0, this.articleData.length);
                        /*response.data.articles.forEach(article => {
                            this.articleData.push(article);
                        });*/
                        if(this.articleData.length <= 0){
                            this.message = 'No more articles found !';
                            this.alertType = 'alert-warning';
                        }
                    }else {
                        this.$swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.data.message,
                        });
                    }
                }).catch(error =>{
                    this.message =  error.message;
                    this.alertType = 'alert-danger';
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
                        if(response.data.success == true){
                            this.articleData.unshift(response.data.article);
                            this.formData = {
                                title: '',
                                context: '',
                                photo: null,
                            };
                            this.$swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }else{
                            this.$swal('Error', response.data.message, 'OK');
                        }

                    }).catch(error => {
                    this.$swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error.message,
                    })
                })
            },
            handleScroll() {
                if (window.scrollY + window.innerHeight >= document.body.scrollHeight - 50) {
                    this.page = this.page + 1;
                    this.getArticleData(this.page);
                }
            },
            loadMore() {
                this.page = this.page + 1;
                this.getArticleData(this.page);
            },
        },
        mounted() {
            //The mounted lifecycle hook is called after the component has been fully rendered
            // and its computed properties have been updated.
            //window.addEventListener("scroll", this.handleScroll);
            // setTimeout(function() {
            // }, 1000);
        }
    }
</script>
<style>

</style>
