<template>
    <div>
        <div class="container-fluid">
            <div v-if="loading==true" class="text-center">
                <div class="fa-5x">
                    <i class="fas fa-spinner fa-pulse fa-spin"></i>
                </div>
            </div>
            <div v-else>
                <div class="card mt-3" v-for="article in articles" v-bind:key="article.id">
                    <img v-bind:src="article.cover" style="width:100%; height:20rem; object-fit:cover">
                    <div class="card-body">
                        <div class="text-uppercase w3-allerta text-muted">
                            <small>{{ article.catagory }}</small>
                        </div>
                        <a :href="storyurl+article.id">{{ article.title }}</a>
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
                articles: [],
                article: {
                    id:'',
                    title:'',
                    catagory:'',
                    cover:'',
                    body:''                    
                },
                article_id:'',
                storyurl:'story/',
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
