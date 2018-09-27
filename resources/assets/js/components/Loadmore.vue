<template>
    <div>
        <h2>Articles</h2>
        <div class="">
            <div class="card mb-3" v-for="article in articles" v-bind:key="article.id">
                <div class="card-body" style="float:right">
                    <img v-bind:src="article.cover" style="width:30vw; height:30vh; float:left; object-fit:cover" class="mr-3">
                    <div class="text-uppercase w3-allerta text-muted">
                        <small>{{ article.catagory }}</small>
                    </div>
                    <h3>{{ article.title }}</h3>
                </div>
            </div>
        </div>
        <div v-if="loadmore_button==true" class="m-3" v-bind:class="[{disabled: !pagination.next_page_url }]">
            <button id="load_more" class="btn btn-block btn-outline-primary p-3" @click="loadmore(pagination.next_page_url)">Load More</button>
        </div>
        <div v-else class="m-3" v-bind:class="[{disabled: !pagination.next_page_url}]">

            <!-- loading icon -->
            <div class="fa-2x text-center">
                <button class="btn btn-block btn-outline-primary p-3 disabled" ><i class="fas fa-circle-notch fa-spin"></i></button>
            </div>
           <!--  end of loading icon -->

        </div>
    </div>
</template>

<script>
    $(function(){ //on document ready
        $(document).scroll(function (e) { //bind scroll event
            var intBottomMargin = 300; //Pixels from bottom when script should trigger
            /* if less than intBottomMargin px from bottom */
            if ($(window).scrollTop() >= $(document).height() - $(window).height() - intBottomMargin) {
                $("#load_more").click(); //trigger click
            }
        });
    });

    export default {
        data: function(){
            return {
                articles: [],
                article_id:'',
                pagination: {},
                edit: false,
                loadmore_button: false,
                finish_loading:false
            };
        },

        created: function(){
            this.fetchArticles();
        },
        
        methods: {
            /* fetch articles from the database */
            fetchArticles(page_url){
                let vm=this;
                page_url = page_url || 'api/articles'
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.articles=res.data;
                        this.makePagination(res);
                        this.loadmore_button=true;
                    }
                )
            },

            loadmore(url){
                this.loadmore_button=false;
                
                fetch(url)
                    .then(res=>res.json())
                    .then(res=>{
                        var i;
                        for(i=0; i< res.data.length; i++){

                            this.articles.push(res.data[i]);
                        }
                        this.makePagination(res);
                        this.loadmore_button=true;
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

