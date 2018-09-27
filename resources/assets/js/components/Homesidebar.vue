<template>
    <div class="">
        <div v-if="loading==true" class="text-center">
            <div class="fa-5x">
                <i class="fas fa-spinner fa-pulse fa-spin"></i>
            </div>
        </div>
        <div v-else>
            <div class="list-unstyled" v-for="article in articles" :key="article.id">
                <div class="media ml-3 mt-3 md-3">
                    <img :src="article.cover" class="mr-3" alt="cover" style="width:6rem; height:6rem; object-fit:cover">
                    <div class="media-body"> 
                        <div style="font-size:.8rem">
                            <a :href="storyurl+article.id" class="mt-0" >{{article.title}}</a>
                        </div>     
                        <div class="w3-allerta text-uppercase">
                            <small>{{moment(article.poster).fromNow()}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
           
</template>
<script>
    var moment = require('moment');
    export default {
        data: function(){
            return {
                articles: [],
                moment:moment,
                loading:false,
                storyurl:'story/',
                article: {
                    id:'',
                    title:'',
                    catagory:'',
                    cover:''
                                        
                },
                article_id:'',
                pagination: {},
                edit: false
            };
        },

        created: function(){
            this.fetchsidebararticles();
            this.loading=true;
        },

        methods: {
            fetchsidebararticles(page_url){
                let vm=this;
                page_url = page_url || 'api/homesidebar'
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.loading=false;
                        this.articles=res.data;
                        
                    })
            },
        }
    };
</script>
