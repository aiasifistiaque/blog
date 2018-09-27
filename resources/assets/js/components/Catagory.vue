<template>
    <div class="container-fluid">
        <div class="form-inline justify-content-end form-group mt-2">

            <label class="mr-2">Catagory</label>
            
            <select class="mr-2 form-control" v-model="selected_catagory" v-on:change="selectCatagory(selected_catagory,sortBy)">
                <option >all</option>
                <option v-for="cat in catagories" v-bind:key="cat.catagory">{{cat.catagory}}</option>
            </select>
            
            <label class="mr-2">Sort By</label>
            <select class="form-control" v-model="sortBy" v-on:change="selectCatagory(selected_catagory,sortBy)">
                <option >newest</option>
                <option >oldest</option>
                <option >A-Z</option>
                <option >Z-A</option>
            </select>
        </div>
        <br>
        <div v-if="loading==true" class="text-center">
            <div class="fa-3x">
                <i class="fas fa-circle-notch fa-spin"></i>
            </div>
        </div>

        <div v-else>
            <h3 v-text="selected_catagory"></h3>
            <div class="card-columns">
                <div class="" v-for="article in articles" v-bind:key="article.id">
                    <div class="card">
                    <img v-bind:src="article.cover" style="width:100%; height:10rem; object-fit:cover">
                        <div class="card-body">
                            <div class="text-uppercase w3-allerta text-muted">
                                <small>{{ article.catagory }}</small>
                            </div>
                            <a :href="storyurl+article.id">{{ article.title }}</a>
                            <div class="text-uppercase w3-allerta text-muted text-right">
                                <small v-text="moment(article.poster).fromNow()"></small>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var moment = require('moment');
export default {
    data:function(){
        return{
            articles:[],
            article:{
                id:'',
                title:'',
                catagory:'',
                cover:'',
                poster:''

            },

            catagories:[],
            cat:{
                catagory:''
            },
            loading:false,
            url: 'api/catagory/all/newest',
            selected_catagory:'all',
            sortBy:'newest',
            storyurl:'/story/',
            moment:moment
        }
    },
    
    created:function(){
        this.fetchCatagories(this.url);
        this.loading=true;
        this.fetchArticlesByCatagory(this.url);
    },

    methods:{
         fetchCatagories(page_url){
                 
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        
                        this.catagories=res.catagories;
                    })
            },

        fetchArticlesByCatagory(page_url){
                 
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.loading=false;
                        this.articles=res.data;
                    })
            },

        selectCatagory(catagory,sortBy){
            this.loading=true;
            this.fetchArticlesByCatagory(`api/catagory/${catagory}/${sortBy}`);
        }
    },
    watch:{
        selected_catagory(){

        }
    }
}
</script>

