<template>
    <div>
        <div class="container-fluid">
            <div v-if="loading==true" class="text-center">
                <div class="fa-5x">
                    <i class="fas fa-spinner fa-pulse fa-spin"></i>
                </div>
            </div>
            <div v-else>

            <div class="card mt-3 bg-dark text-white" v-for="article in articles" v-bind:key="article.id">
                <a :href="storyurl+article.id">
                    <img v-bind:src="article.cover" class="car-img" style="width:30vw; height:20vw object-fit:cover" >
                </a>
                <div class="card-img-overlay">
                    <div class="card-text text-uppercase w3-allerta text-info" style="text-shadow: 0 0 2px black;">
                        <small>{{ article.catagory }}</small>
                    </div>
                    <a :href="storyurl+article.id">
                        <h2 class="card-title" style="text-shadow: 2px 2px 4px black;">{{ article.title }}</h2>
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                storyurl:'story/',
                articles: [],
                article: {
                    id:'',
                    title:'',
                    catagory:'',
                    cover:'',
                    body:''                    
                },
                article_id:'',
                loading: false
            };
        },

        created: function(){
            this.fetchArticles();
            this.loading=true;
        },

        methods: {
            fetchArticles(page_url){
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
