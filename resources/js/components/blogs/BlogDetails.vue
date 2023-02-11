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
                <!-- Article Content -->
                <div class="mt-4 article_content">
                    <!-- Article Header -->
                    <div class="mb-4 article_header">
                        <!-- Article title-->
                        <h1>{{ article.title }}</h1>
                        <!-- Article meta content-->
                        <h6 class="text-muted mb-2">Posted on {{ article.created_at }} by <a href="#!">{{ article.author_name }}</a></h6>
                        <!-- Post categories-->
                        <a class="badge badge-dark text-decoration-none link-dark" href="#!">Web Design</a>
                        <a class="badge badge-dark text-decoration-none link-dark" href="#!">Freebies</a>
                    </div><!-- ./article_header -->
                    <!-- Preview image figure-->
                    <figure class="mb-4">
                        <img class="img-fluid rounded w-100 article_details_img" :src="article.photo" alt="..." />
                    </figure>
                    <div class="article_context">
                        {{ article.context }}
                    </div>
                </div><!-- ./article_content -->
                <!-- Article Comments -->
                <div class="mt-5 article_comment">
                    <div class="card">
                        <div class="card-header">
                            <h5>Article Comments</h5>
                        </div>
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                            <!-- Comment with nested comments-->
                            <div class="d-flex mb-4">
                                <!-- Parent comment-->
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                    <!-- Child comment 1-->
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                        </div>
                                    </div>
                                    <!-- Child comment 2-->
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            When you put money directly to a problem, it makes a good headline.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single comment-->
                            <div class="d-flex">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Article Comments -->
            </div><!-- ./col-md-6 (Page Middle Section) -->
            <div class="col-md-3"></div><!-- ./col-md-6 (Page Left Section) -->
        </div>
    </div>
</template>
<script>
    import BlogUserCard from "./BlogUserCard.vue";
    import axios from "axios";
    import axiosConfig from "../../axiosConfig";
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
        data: function(){
            return {
                id: null,
                article:{
                    title: '',
                    context: '',
                    photo: null,
                    author_name: '',
                    created_at: '',
                },
                message: '',
                alertType:'alert-light',
            }
        },
        created(){
            let app = this;
            let id = app.$route.params.id;
            app.id = id;
            this.id = id;
        },
        methods:{
            getDetails(id)
            {
                if (typeof id === 'undefined') {
                    this.message = 'ID not found !';
                    this.alertType = 'alert-danger';
                    return false;
                }
                //console.log(id);
                axios.get('/api/blog/details/'+ id).then(response =>{
                    if(response.data.success == true){
                        this.article.title = response.data.article.title;
                        this.article.context = response.data.article.context;
                        this.article.photo = response.data.article.photo;
                        this.article.author_name = response.data.article.author_name;
                        this.article.created_at = response.data.article.created_at;
                        //console.log(response.data.article);
                    }else{
                        this.message =  response.data.message;
                        this.alertType = 'alert-danger';
                    }
                }).catch(error => {
                    this.message =  error.message;
                    this.alertType = 'alert-danger';
                });
            },
        },
        mounted() {
            //The mounted lifecycle hook is called after the component has been fully rendered
            // and its computed properties have been updated.
            this.getDetails(this.id);
            //console.log('Component Mounted', this.id);
        }
    }
</script>
