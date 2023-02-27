<template>
    <div class="mt-4 vue_blog_search_card">
        <div class="card">
            <div class="card-header">
                <h6>Search</h6>
            </div>
            <div class="card-body">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Enter search term..."
                           aria-label="Enter search term..." aria-describedby="button-search" v-model="searchTerm"/>
                    <button class="btn btn-dark" type="button" @click="goForSearch"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data: function(){
            return{
                searchTerm: '',
            }
        },
        methods: {
          goForSearch()
          {

          },
        },
    }
</script>
