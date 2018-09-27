<template>
    <div>
        <div class="row">

                    <div class="form-inline justify-content-end form-group">

                        <label class="mr-2" >Sort By</label>
                        <select class="form-control" v-model="sortBy" v-on:change="selectsort(sortBy)" >
                            <option >newest</option>
                            <option >oldest</option>
                            <option >A-Z</option>
                            <option >Z-A</option>
                        </select>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 "  v-for="article in articles" v-bind:key="article.id" >
                        <div class="card">
                        <img v-bind:src="article.cover" style="width:100%; height:10rem; object-fit:cover">
                            <div class="card-body">
                                <div class="text-uppercase w3-allerta text-muted text-right">
                                    <small v-text="moment(article.poster).fromNow()"></small>
                                </div>
                                <div class="text-uppercase w3-allerta text-muted">
                                    <small>{{ article.catagory }}</small>
                                </div>
                                <a :href="storyurl+article.id" class="card-text">{{ article.title }}</a>
                                <div>
                                    <button class="btn btn-link">Edit</button>
                                    <button class="btn btn-link">Delete</button>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
    </div>
</template>
<script>
var moment = require('moment');
export default {
    data: function(){
        return{
            articles:[],
            storyurl:'/story/',
            url:'',
            moment:moment,
            sortBy:'newest'

        }
    },
    methods:{
        selectsort(sortBy){
            this.loading=true;
             fetch(this.url+sortBy)
                    .then(function(res){
                                var fet=res.json(); 
                                return fet;
                    }).then(res => {
                        this.articles=res.data;
                        this.loading=false;
                        
                    })
        
        }
    }
    
}
</script>

