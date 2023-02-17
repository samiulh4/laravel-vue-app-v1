<template>
    <div class="vue_content_wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <BlogUserCard v-bind:authUserProps="authUser" v-if="authLoggedIn" />
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


                    <div class="card mt-4 vue_article_create_edit_card" v-if="authLoggedIn == true">
                        <div class="card-body">
                            <button class="btn btn-lg btn-light w-100" @click="openCreateFormModal">What's on your mind,
                                {{ authUser.name }} ?
                            </button>
                        </div>
                    </div>


                    <!-- Articles -->
                    <div class="card mt-4 vue_article_card" v-for="article in articleData" :key="article.id">
                        <div class="card-header">
                            <h5 class="text-dark">{{ article.title.slice(0, 70) }}... || {{ article.id }}</h5>
                        </div>
                        <img :src="article.photo" class="img-fluid w-100 card-img-top" alt="COVER IMAGE NOT FOUND"
                            @error="setAltImg" />
                        <div class="card-body">
                            <p class="card-text">{{ article.context.slice(0, 200) }}...</p>
                        </div>
                        <div class="card-footer">
                            <div class="float-left">
                                <small class="text-muted">
                                    Created By&nbsp;-&nbsp;
                                    <a href="#">{{ article.author_name }}</a>
                                    |
                                    <span>{{ article.created_at }}</span>
                                </small>
                            </div>
                            <router-link :to="{ name: 'BlogDetails', params: { id: article.id } }"
                                class="btn btn-sm btn-dark float-right"><i class="fa fa-circle-info"></i>
                                Details
                            </router-link>

                            <button class="btn btn-sm btn-success float-right" v-if="authLoggedIn == true"
                                @click="openEditFormModal(article.id)"><i class="fa fa-circle-info"></i> Edit
                            </button>
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
                                <input class="form-control" type="text" placeholder="Enter search term..."
                                    aria-label="Enter search term..." aria-describedby="button-search" />
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
                                        <li><a href="#!" class="badge badge-dark text-decoration-none link-dark">Web
                                                Design</a></li>
                                        <li><a href="#!" class="badge badge-dark text-decoration-none link-dark">HTML</a>
                                        </li>
                                        <li><a href="#!"
                                                class="badge badge-dark text-decoration-none link-dark">Freebies</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!"
                                                class="badge badge-dark text-decoration-none link-dark">JavaScript</a>
                                        </li>
                                        <li><a href="#!" class="badge badge-dark text-decoration-none link-dark">CSS</a>
                                        </li>
                                        <li><a href="#!"
                                                class="badge badge-dark text-decoration-none link-dark">Tutorials</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tags widget-->


                </div><!-- ./col-md-6 (Page Left Section) -->
            </div><!-- ./row -->


            <!-- start -:- Article Create & Edit Modal -->
            <div class="modal fade" id="articleCreatAndEditModal" tabindex="-1"
                aria-labelledby="articleCreatAndEditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                        <form @submit.prevent="saveForm()">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="articleCreatAndEditModalLabel">Create
                                    Article</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" v-model="formData.title" class="form-control"
                                        placeholder="Enter title here" />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Context</label>
                                    <textarea v-model="formData.context" class="form-control"
                                        v-bind:placeholder="['What\'s on your mind , '] + authUser.name + [' ?']"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Tags</label>
                                    <select class="form-control" v-model="formData.tag_ids">
                                        <option v-for="option in tagData" :key="option.id" :value="option.id">{{
                                            option.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Image</label>
                                    <input type="file" class="form-control" v-on:change="onFileChange" />
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
            <!-- end -:- Article Create & Edit Modal -->


        </div><!-- ./container-fluid -->
    </div>
</template>
<script>
import axios from "axios";
import axiosConfig from "../../axiosConfig";
import BlogUserCard from "./BlogUserCard.vue";
import { mapState, mapGetters, mapActions, mapMutations } from 'vuex';
import defaultCoverImage from "../../images/cover.png";

//import $ from 'jquery';
//import 'select2/dist/js/select2.min.js';
//import 'select2/dist/css/select2.min.css';
//import { Select2 } from 'vue-select2';// no need
//import Select2 from 'v-select2-component';// no need

export default {
    components: {
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
    data() {
        return {
            articleData: [],
            formData: {
                id: '',
                title: '',
                context: '',
                photo: null,
                tag_ids: '',
            },
            message: '',
            alertType: 'alert-light',
            page: 0,
            tagData: {
                id: '',
                name: ''
            },
        }
    },
    created() {
        this.getArticleData();
        this.getTags();
    },
    methods: {
        ...mapActions('currentUser', ['checkAuthTokenExpiration']),
        getArticleData(page) {
            if (typeof page === 'undefined') {
                page = 0;
            }
            axios.get('/api/blog/index/' + page).then(response => {
                if (response.data.success == true) {
                    //this.articleData = response.data.articles;
                    this.articleData = [...this.articleData, ...response.data.articles];
                    //this.articleData = [...this.articleData, ...Array.from(response.data.articles)];
                    //this.articleData = [...this.articleData, ...Object.values(response.data.articles)];
                    //this.articleData.splice(0, this.articleData.length);
                    /*response.data.articles.forEach(article => {
                        this.articleData.push(article);
                    });*/
                    if (this.articleData.length <= 0) {
                        this.message = 'No more articles found !';
                        this.alertType = 'alert-warning';
                    }
                } else {
                    this.$swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.data.message,
                    });
                }
            }).catch(error => {
                this.message = error.message;
                this.alertType = 'alert-danger';
            })
        },
        getTags() {
            axios.get('/api/blog/tag/get-tags').then(response => {
                if (response.data.success == true) {
                    this.tagData = response.data.tags;
                } else {
                    this.message = response.data.message;
                    this.alertType = 'alert-danger';
                }
            }).catch(error => {
                this.message = error.message;
                this.alertType = 'alert-danger';
            });
        },
        onFileChange(event) {
            this.formData.photo = event.target.files[0]
        },
        saveForm() {
            let form = new FormData();
            form.append('title', this.formData.title);
            form.append('context', this.formData.context);
            form.append('photo', this.formData.photo);
            form.append('tag_ids', this.formData.tag_ids);
            form.append('id', this.formData.id);
            axiosConfig.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axiosConfig.post('/api/blog/store', form)
                .then(response => {
                    if (response.data.success == true) {
                        this.articleData.unshift(response.data.article);
                        let self = this;
                        this.resetForm(self);
                        this.$swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#articleCreatAndEditModal').modal('hide');
                    } else {
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
        resetForm(self) {
            Object.keys(this.formData).forEach(function (key, index) {
                self.formData[key] = '';
            });
        },
        loadMore() {
            this.page = this.page + 1;
            this.getArticleData(this.page);
        },
        handleScroll() {
            if (window.scrollY + window.innerHeight >= document.body.scrollHeight - 50) {
                this.page = this.page + 1;
                this.getArticleData(this.page);
            }
        },
        openCreateFormModal() {
            this.formData.id = null;
            $('#articleCreatAndEditModal').modal('show');
        },
        getEditData(id) {
            if (typeof id === 'undefined') {
                this.$swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "ID not found !",
                });
                return false;
            }
            axiosConfig.get('/api/blog/edit/' + id).then(response => {
                if (response.data.success == true) {
                    this.formData.title = response.data.article.title;
                    this.formData.context = response.data.article.context;
                    this.formData.photo = response.data.article.photo;
                    this.formData.tag_ids = response.data.article.tag_ids;
                    this.formData.id = response.data.article.id;
                } else {
                    this.message = response.data.message;
                    this.alertType = 'alert-danger';
                }
            }).catch(error => {
                this.message = error.message;
                this.alertType = 'alert-danger';
            });
        },
        openEditFormModal(id) {
            this.getEditData(id);
            $('#articleCreatAndEditModal').modal('show');
        },
        setAltImg(event) {
            event.target.src = defaultCoverImage;
        },
        async isTokenExpiry() {
            try {
                await this.checkAuthTokenExpiration();
            } catch (error) {
                console.log('BlogIndex [Error] => '+ error);
            }
        },
    },
    mounted() {
        this.isTokenExpiry();
        //The mounted lifecycle hook is called after the component has been fully rendered
        // and its computed properties have been updated.
        //window.addEventListener("scroll", this.handleScroll);
        // setTimeout(function() {
        // }, 1000);
        //$('.js-example-basic-single').select2();
        //this.isTokenExpiry(this.authToken);
    }
}
</script>
<style>
/*.select2{*/
/*    width: 100% !important;*/
/*}*/</style>
