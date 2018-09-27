<template>
    
    <div class="container-fluid">
        <ul class="nav nav-tabs justify-content-center nav-fill" >
            
            <li class="nav-item">
                <a class="nav-link" href="#" v-bind:class="{active:isPending}" v-on:click="navbutton(0)">Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" v-bind:class="{active:isAccepted}" v-on:click="navbutton(1)">Accepted</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" v-bind:class="{active:isRejected}" v-on:click="navbutton(2)">Rejected</a>
            </li>
        </ul>
        <br>

        <ul class="pagination">
            <li v-bind:class="[{disabled: !pagination.prev_page_url }]" class="page-item">
                <a href="#" class="page-link" v-on:click="fetchArp(pagination.prev_page_url)">Previous</a>
            </li>
            
            <li v-bind:class="[{disabled: !pagination.next_page_url }]" class="page-item">
                <a href="#" class="page-link" v-on:click="fetchArp(pagination.next_page_url)">Next</a>
            </li>
        </ul>
        <div v-if="loading==true" class="text-center">
            <div class="fa-5x">
                <i class="fas fa-spinner fa-pulse fa-spin"></i>
            </div>
        </div>

        <div v-else-if="loading==false">
            <div class="row"> 
                <div class="col-xl-3 col-lg-3 col-md-3 col-xm-12 col-xs-12" v-for="article in articles" v-bind:key="article.id">
                    <div class="card">
                        <img v-bind:src="article.cover" style="width:100%; height:10rem; object-fit:cover">
                        <div class="card-body">
                            <div class="text-uppercase w3-sllerta text-right text-muted">
                                <small v-text="moment(article.poster).fromNow()"></small>
                            </div>
                            <div class="text-uppercase w3-allerta text-muted">
                                <small v-text="article.catagory"></small>
                            </div>
                            <a :href="storyurl+article.id"> {{ article.title }} </a>
                            <hr>
                            <p class="w3-allerta">status: {{status(article.permission)}}</p>
                            <div v-if="article.permission==1">
                                <button class="btn btn-link" v-on:click="edit_permission(article,2)">Reject</button>
                                <button class="btn btn-link" v-on:click="deleteArticle(article)">Delete</button>
                            </div>
                            <div v-else-if="article.permission==2">
                                <button class="btn btn-link" v-on:click="edit_permission(article,1)">Pre Rejected Approve</button>
                                <button class="btn btn-link" v-on:click="deleteArticle(article)">Delete</button>
                            </div>
                            <div v-else>
                                <button class="btn btn-link" v-on:click="edit_permission(article,1)">Accept</button>
                                <button class="btn btn-link" v-on:click="edit_permission(article,2)">Reject</button>
                                <button class="btn btn-link" v-on:click="deleteArticle(article)">Delete</button>
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
        data: function(){
            return {
                isPending: true,
                moment:moment,
                isAccepted: false,
                isRejected: false,
                articles: [],
                url:'',
                loading:false,

                article: {
                    id:'',
                    title:'',
                    catagory:'',
                    cover:'',
                    permission:'',
                    poster:''
                                                          
                },
                dt: {
                    id:'',
                    permission:''
                                   
                },
                article_id:'',
                pagination: {},
                edit: false,
                storyurl:'/story/'
            };
        },

        created: function(){
            this.fetchArp();
            this.loading=true;
        },
        
        methods: {
            fetchArp(page_url){
                let vm=this;
                page_url = page_url || '/api/arp/0';
                fetch(page_url)
                    .then(function(res){
                         
                         console.log("fetch first: "+res);
                                var fet=res.json();
                                
                                return fet;
                    })
                    .then(res => {
                        this.loading=false;
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
            },

            status(permission){
                if(permission==0){
                    return 'pending';
                }else if(permission==1){
                    return 'accepted';
                }else if(permission==2){
                    return 'rejected';
                }
            },

            permissionButton(permission){
                if(permission==0){
                    return 'pending';
                }else if(permission==1){
                    return 'accepted';
                }else if(permission==2){
                    return 'rejected';
                }
            },

            navbutton(type){

                if (type==0){
                    this.isAccepted=false;
                    this.isRejected=false;
                    this.isPending=true;

                }else if(type==1){
                    this.isRejected=false;
                    this.isPending=false;
                    this.isAccepted=true;

                }else if(type==2){
                    this.isPending=false;
                    this.isAccepted=false;
                    this.isRejected=true;
                }
                this.loading=true;
                this.fetchArp('/api/arp/'+type);
            },
           
            deleteArticle(article) {

                var app = this;
                this.loading=true;
                this.url='/api/arp/'+article.permission;              
                fetch(`/api/story/${article.id}`, {
                    method:"delete"                                                            
                })
                    .then(res => res.json())
                    .then(data => {
                        alert('Article Removed');
                        this.fetchArp(this.url);
                    })
                    .catch(err => alert(err));               
            },

            edit_permission(article,perm){

                this.dt.id=article.id;
                this.dt.permission=perm;
                this.url='/api/arp/'+article.permission;
                console.log("debug: "+ article.permission);  
                this.loading=true;             
                fetch('/api/changepermission',{
                    method:'put',
                    body: JSON.stringify(this.dt),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res =>res.json())
                .then(data =>{
                    
                    this.fetchArp(this.url);
                })
            },                        
        }
    };
</script>
