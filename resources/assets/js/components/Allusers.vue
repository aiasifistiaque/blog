<template>
    <div class="container-fluid">
        <div class="">
            <h3>All Users</h3>
            <hr>
        </div>
        <div v-if="loading==true" class="text-center">
            <div class="fa-5x">
                <i class="fas fa-spinner fa-pulse fa-spin"></i>
            </div>
        </div>
        <div v-else-if="loading==false">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12" v-for="user in allusers" v-bind:key="user.id">

                    <div class="card">
                        <div class="card-body">
                            <div class="w3-allerta text-muted text-right text-uppercase">
                                <small> {{user.id}}</small>
                            </div>
                            <h6 class="card-text">{{user.name}}</h6>
                            <p class="card-text">email: {{user.email}}</p>
                            <div class="w3-allerta text-muted text-right text-uppercase">
                                <small>Joined {{moment(user.created_at).fromNow()}}</small>
                            </div>
                            <br>
                            <button v-on:click="deleteUser(user)" class="btn btn-outline-danger btn-block">Delete User</button>
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
            allusers: [],
            loading:false,
            moment:moment,
            user:{
                id:'',
                name:'',
                email:'',
                created_at:''
            }

        }
    },

    created: function(){
        this.loading=true;
        this.showUsers();
    },

    methods: {
        showUsers(){
            fetch('api/profile')
                .then(response=>response.json())
                .then(response=>{
                    this.loading=false;
                    this.allusers=response.data;
                })
        },
    
        deleteUser(user) {
            this.loading=true;                  
            fetch(`api/deleteuser/${user.id}`, {
                method:"delete"                                                            
            })
                .then(res => res.json())
                .then(data => {
                    this.showUsers();
                })
                .catch(err => alert(err));               
        }
    }  
}
</script>
