<template>
    <div>
        <h2>Articles</h2>
        <ul class="pagination">
            <li v-bind:class="[{disabled: !pagination.prev_page_url }]" class="page-item">
                <a href="#" class="page-link" @click="fetchArticles(pagination.prev_page_url)">Previous</a>
            </li>
            
            <li v-bind:class="[{disabled: !pagination.next_page_url }]" class="page-item">
                <a href="#" class="page-link" @click="fetchArticles(pagination.next_page_url)">Next</a>
            </li>
        </ul>

        <div class="card mb-3" v-for="article in articles" v-bind:key="article.id">
            <img v-bind:src="article.cover" style="width:100%; height:20rem; object-fit:cover">
            <div class="card-body">
                <div class="text-uppercase w3-allerta text-muted">
                    <small>{{ article.catagory }}</small>
                </div>
                <h3>{{ article.title }}</h3>
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
                pagination: {},
                edit: false
            };
        },

        created: function(){
            this.fetchArticles();
        },

        methods: {
            fetchArticles(page_url){
                let vm=this;
                page_url = page_url || 'api/articles'
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.articles=res.data;
                        vm.makePagination(res);
                    })
            },
            makePagination(res){
                let pagination = {
                    current_page: res.current_page,
                    last_page: res.last_page,
                    next_page_url: res.next_page_url,
                    prev_page_url: res.prev_page_url
                }
                this.pagination = pagination;
            }
        }
    };
</script>

