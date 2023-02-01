<template>
    <div class="container-fluid article_create_section">
        <div class="row">
            <div class="col-md-8 offset-md-4 mx-auto">
                <form @submit.prevent="saveForm()">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">New Blog</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group col-md-12">
                                <label class="control-label">Title</label>
                                <div class="">
                                    <input type="text" class="form-control" placeholder="Enter Title"
                                        v-model="blogStoreData.title" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Context</label>
                                <div class="">
                                    <textarea class="form-control" rows="6" placeholder="Enter Context"
                                        v-model="blogStoreData.context"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Upload Image</label>
                                <div class="">
                                    <input type="file" class="form-control" v-on:change="onFileChange" />
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            blogStoreData: {
                title: '',
                context: '',
                photo: ''
            }
        }
    },
    methods: {
        onFileChange(event) {
            this.blogStoreData.photo = event.target.files[0]
        },
        saveForm(){
            let app = this;
            let form = new FormData();
            form.append('title',this.blogStoreData.title);
            form.append('context',this.blogStoreData.context);
            form.append('photo',this.blogStoreData.photo);
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post('/blog/article/ajax/store', form)
            .then(function (response) {
                console.log(response.data.message);
            }).catch((error) => {
                console.error(error.data.message);     
            })
        }
    },
    mounted() {
        console.log('Blog create component mounted.')
    }
}
</script>
<style>
.article_create_section{
    margin-bottom: 50px;
}
</style>
