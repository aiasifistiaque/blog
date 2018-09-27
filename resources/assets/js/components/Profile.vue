<template>
    <div class="">
        
        <div class="w3-sidebar w3-bar-block bg-dark text-white d-none d-md-block" style="width:20%"> 
            <img :src="cover" class="img-thumbnail" alt="">
            <div v-for="profile in profiles" :key="profile.id">
                <p class="w3-bar-item text-center w3-red">{{profile.name}}</p>
                <a href="#" class="w3-bar-item w3-button" @click="overviews()"><i class="far fa-user"></i> Overview</a>
                <a href="#" class="w3-bar-item w3-button" @click="getstories(profile.id,4)"><i class="fas fa-newspaper"></i> All Articles </a>
                <a href="#" class="w3-bar-item w3-button" @click="getstories(profile.id,1)"><i class="fas fa-check"></i> Accepted</a>
                <a href="#" class="w3-bar-item w3-button" @click="getstories(profile.id,2)"><i class="fas fa-ban"></i> Rejected</a>
                <a href="#" class="w3-bar-item w3-button" @click="getstories(profile.id,0)"><i class="fas fa-hourglass-start"></i>  Pending</a>
                <a href="#" class="w3-bar-item w3-button" @click="editprofile()"><i class="fas fa-user-edit"></i> Edit Profile</a>
                <a href="#" class="w3-bar-item w3-button"><i class="fas fa-cog"></i> Settings</a>
                <a href="#" class="w3-bar-item w3-button"><i class="fas fa-eye"></i> Views</a>
                <a href="#" class="w3-bar-item w3-button"><i class="fas fa-bars"></i> About</a>
                <a href="#" class="w3-bar-item w3-button"><i class="far fa-envelope"></i> Contact</a>
                
            </div>
            
        </div>

            <div class="w3-sidebar w3-bar-block bg-dark text-white w3-animate-left " style="display:none; width:100%" id="mySidebar">
                <button class="w3-bar-item w3-button w3-large"
                @click="w3_close()">Close &times;</button>
                <img :src="cover" class="img-thumbnail" alt="">
                <div v-for="profile in profiles" :key="profile.id">
                    <p class="w3-bar-item text-center w3-red">{{profile.name}}</p>
                    <a href="#" class="w3-bar-item w3-button" @click="overviews()"><i class="far fa-user"></i> Overview</a>
                    <a href="#" class="w3-bar-item w3-button" @click="getstories(profile.id,4)"><i class="fas fa-newspaper"></i> All Articles </a>
                    <a href="#" class="w3-bar-item w3-button" @click="getstories(profile.id,1)"><i class="fas fa-check"></i> Accepted</a>
                    <a href="#" class="w3-bar-item w3-button" @click="getstories(profile.id,2)"><i class="fas fa-ban"></i> Rejected</a>
                    <a href="#" class="w3-bar-item w3-button" @click="getstories(profile.id,0)"><i class="fas fa-hourglass-start"></i>  Pending</a>
                    <a href="#" class="w3-bar-item w3-button" @click="editprofile()"><i class="fas fa-user-edit"></i> Edit Profile</a>
                    <a href="#" class="w3-bar-item w3-button"><i class="fas fa-cog"></i> Settings</a>
                    <a href="#" class="w3-bar-item w3-button"><i class="fas fa-eye"></i> Views</a>
                    <a href="#" class="w3-bar-item w3-button"><i class="fas fa-bars"></i> About</a>
                    <a href="#" class="w3-bar-item w3-button"><i class="far fa-envelope"></i> Contact</a>
                    
                </div>
            </div>

        <div>
            <button class="w3-button w3-white w3-large d-xs-block d-md-none" @click="w3_open()">&#9776;</button>
        </div>


        <div v-if="loading==true" class="text-center">
            <div class="fa-5x">
                <i class="fas fa-circle-notch fa-spin"></i>
            </div>
        </div>
        <div v-else class="container-fluid">
            

            <div v-if="arp==true" class="offset-md-3">
                <br>
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

            <div v-else-if="overview==true" class="offset-md-3 " v-for="profile in profiles" :key="profile.id">
                <h2 >Profile Overview</h2>
                
                <div class="card-columns">
                    <div class="card">
                        <img :src="cover" alt="profile picture" style="width:100%; height:20%; object-fit:cover">
                        <div class="card-body">
                            <a class="btn btn btn-outline-dark mt-3 mr-3" href="/write"><i class="far fa-edit"></i> Create a new post</a>
                            <a class="btn btn-outline-dark mt-3" href="#" @click="getstories(profile.id,4)"><i class="far fa-eye"></i> View all posts</a>
                        </div>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-body text-center">
                            <img :src="cover" alt="profile picture" style="width:30%; height:30%; object-fit:cover">
                            <h3 v-text="profile.name" ></h3>
                            <p >E-mail: {{profile.email}}</p>
                            <p >Joined {{profile.created_at}} </p>
                        </div>

                    </div>
                    
                    <div class="card" v-for="total in totalviews" :key="total.views" >
                        <div class="card-body text-center">
                            <h4 class="card-text">Post Overview</h4>
                            <hr>
                            <p class="card-text">Total Posts</p>
                            <p class="card-text">{{total.articlecount}}</p>

                            <p class="card-text">Total Article Views</p>
                            <p class="card-text">{{total.views}}</p>
                            <p class="card-text">Article Accepted</p>
                            <p class="card-text">{{total.accepted}}</p>
                            <p class="card-text">Article Rejected</p>
                            <p class="card-text">{{total.rejected}}</p>
                            <p class="card-text">Article Pending</p>
                            <p class="card-text">{{total.pending}}</p>

                        </div>

                    </div>
                    
                </div>  
                
                
            </div>
            <div v-else-if="edit==true" class="offset-md-3">
                <profile-edit :userid="userid"> </profile-edit>
            </div>
        </div>

    </div>
</template>

<script>

var moment = require('moment');

export default {
    data:function(){
        return{
            profiles:[],
            articles:[],
            edit:false,
            storyurl:'/story/',
            url:'',
            moment:moment,
            sortBy:'newest',
            profile:{
                name:'',
                email:'',
                
            },
            dt:{
                id:''
            },
            cover:'',
            w3show:{
                display:'block'
            },
            w3hide:{
                display:'none'
            },
            w3hs:false,
            loading:true,
            arp:false,
            overview:true,
            totalviews:[],
            total:{
                views:'',
                articlecount:''
            }
        }
        
    },

    props: {
            userid: Number ,
    },

    created(){
        this.overviewscreated();
    },
    methods:{
        fetchProfile(url){
            this.dt.id=this.userid;
            fetch(url,{
                    method:'post',
                    body: JSON.stringify(this.dt),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                    .then(res => res.json())
                    .then(res => {
                        this.loading=false;
                        this.profiles=res.data;
                        this.cover=res.cover;
                    })
        
        },

        w3_open(){
            document.getElementById("mySidebar").style.display = "block";

        },

        w3_close(){
            document.getElementById("mySidebar").style.display = "none";

        },

         fetchStory(page_url){
             this.w3_close();
                fetch(page_url)
                    .then(function(res){
                                var fet=res.json(); 
                                
                                return fet;
                                
                    })
            },
        getstories(id,permission){
            /* if(permission==1){
                this.pending=false;
                this.rejected=false;
                this.accepted=true;
            }else if(permission==2){
                this.accepted=false;
                this.pending=false;
                this.rejected=true;
            }else if(permission==0){
                this.accepted=false;
                this.rejected=false;
                this.pending=true;
            } */
            this.edit=false,
            this.loading=true,
            this.url=`api/dashstory/${id}/${permission}/`;
            this.w3_close();
            fetch(this.url+'newest')
                    .then(function(res){
                                var fet=res.json(); 
                                return fet;
                    }).then(res => {
                        this.articles=res.data;
                        this.loading=false,
                        this.overview=false;
                        this.arp=true;
                    })
        },

        overviews(){           
            this.arp=false;
            this.edit=false;
            this.loading=true;
            this.w3_close();
            
            fetch(`api/totalviews/${this.userid}`)
                .then(res =>res.json())
                .then(res=> {
                    this.totalviews=res.data;
                    this.overview=true;
                })
            this.fetchProfile('api/userprofile');
            

        },

        overviewscreated(){           
            this.arp=false;
            this.loading=true;
            
            fetch(`api/totalviews/${this.userid}`)
                .then(res =>res.json())
                .then(res=> {
                    this.totalviews=res.data;
                    this.overview=true;
                })
            this.fetchProfile('api/userprofile');
            

        },

        editprofile(){
            this.edit=true;
            this.overview=false;
            this.arp=false;
            this.w3_close();
            
        },
        

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

