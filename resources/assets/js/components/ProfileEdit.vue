<template>
    <div >
        <div v-if="loading==true">
            <!-- loading icon -->
                <div v-if="loading==true" class="text-center">
                    <div class="fa-5x">
                        <i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            <!--  end of loading icon -->
        </div>
        <div v-else-if="loading==false" class="container mt-5">
            <div class="card mt-5">
                <div class="card-body">

                    <div v-for="profile in profiles" :key="profile.id">
                        <div v-if="edit.name==false">
                            <div class="form-inline">
                                <div class="form-group mb-2">
                                    <label >{{profile.name}}</label>
                                    <button class="btn btn-link" @click="edit.name=true">Edit</button>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="edit.name==true">
                            <input type="text" class="form-control" :value="profile.name" @input="nameEdit.name = $event.target.value"><br>
                            <div v-if="!load.name">
                                <button class="btn btn-link" @click="changename()">Save</button>
                                <button class="btn btn-link" @click="edit.name=false">Cancel</button>
                            </div>
                            <div v-else-if="load.name">
                                <div class="fa-2x text-center">
                                    <button class="btn btn-link disabled" ><i class="fas fa-circle-notch fa-spin"></i></button>
                                </div>
                            </div>
                        </div>
                        <div v-if="!edit.email">
                            <div class="form-inline">
                                <div class="form-group mb-2">
                                    <label> {{profile.email}}</label>
                                    <button class="btn btn-link text-right" @click="edit.email=true">Edit</button>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="edit.email">
                            <input type="text" class="form-control" :value="profile.email" @input="emailEdit.email = $event.target.value"><br>
                            <div v-if="!load.email">
                                <button class="btn btn-link" @click="changeemail()">Save</button>
                                <button class="btn btn-link" @click="edit.email=false">Cancel</button>
                            </div>
                            <div v-else-if="load.email">
                                <div class="fa-2x text-center">
                                    <button class="btn btn-link disabled" ><i class="fas fa-circle-notch fa-spin"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        data:function(){
            return{
                cover:'',
                loading:'',
                load:{name:false,email:false},
                profiles:[],
                //profile:{name:'',email:'',id:''},
                dt:{id:''},
                edit:{name:false,email:false},
                nameEdit:{name:'',id:''},
                emailEdit:{email:'',id:''}
            }
        },
        props:{
            userid: Number,
        },
        created(){
            this.loading=true;
            this.fetchProfile('api/userprofile');
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

            changename(){
                this.load.name=true;
                this.nameEdit.id=this.userid;
                fetch('api/editname',{
                        method:'post',
                        body: JSON.stringify(this.nameEdit),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                        .then(res => res.json())
                        .then(res => {
                            this.profiles=res.data;
                            this.edit.name=false;
                            this.nameEdit.name='';
                            this.load.name=false;
                        })                
            },

            changeemail(){
                this.load.email=true;
                this.emailEdit.id=this.userid;
                fetch('api/editemail',{
                        method:'post',
                        body: JSON.stringify(this.emailEdit),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                        .then(res => res.json())
                        .then(res => {
                            this.profiles=res.data;
                            this.edit.email=false;
                            this.emailEdit.email='';
                            this.load.email=false;
                        })            
            }
        }
    }
</script>

