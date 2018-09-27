<template>
    <div class="container">
        <div class="text-center">
            <button class="btn btn-block btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">show modal</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
                <div class="modal-content" style="opacity:1;">
                    <div class="modal-body">
                        <form enctype="multipart/form-data" @submit.prevent="submitform" class="m-3">
                            <input type="text" class="form-control mt-3" v-model="name" placeholder="Enter name here">
                            <input type="file" class="mt-3 form-control" v-on:change="handleimage">
                            <!-- <input type="text" class="form-control mt-3" v-model="image" placeholder="Enter url here"> -->
                            
                            <button class="btn btn-outline-primary btn-block mt-3" type="submit">
                                <div v-if="loading">
                                    <div class="fa-x">
                                        <i class="fas fa-circle-notch fa-spin"></i>
                                    </div>
                                </div>
                                <div v-else-if="loading==false"> upload </div> 
                            </button>
                        </form>
                        <div v-if="!showcrop">
                            <div v-if="imagedata.length > 0" class="mt-3" style="width: 100%; height:auto; border: 1px solid gray; display: inline-block;">
                                <p>before upload</p>
                                <vue-cropper
                                    ref="cropper"
                                    :src="imagedata"
                                    alt="Source Image"
                                    :cropBoxResizable="true"
                                    :background="false"
                                    :aspectRatio= "9/9"
                                    :img-style="{ 'width': '300px', 'height': '300px' }"
                                    >
                                </vue-cropper>
                            </div>
                            <button @click="cropImage" v-on:change="handlecrop" v-if="imagedata != ''" style="margin-right: 40px;">Crop</button>
                        </div>
                        <div v-if="showcrop">
                            <img :src="cropImg" style="width: 200px; height: 150px; border: 1px solid gray" alt="Cropped Image">
                        </div>

                        <div v-if="imageshow" class="mt-3" v-for="object in returnobject" :key="object.id">
                            <p>after upload</p>
                            <img :src="object.url" alt="no image" width="100%" height="auto">
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import VueCropper from 'vue-cropperjs';
export default {
    components: {
      VueCropper,
    },
    data: function(){
        return{
            name:'',
            imgSrc: '',
            cropImg: '',
            image:'',
            imagedata:'',
            returnimage:'',
            newimage:'',
            showcrop:false,
            loading:false,
            imageshow:false,
            returnobject:[],
            input:{
                name:'',
                image:''
            }

        }
    },

    creted: function(){

    },

    methods:{
        submitform(){
            this.loading=true;
            //this.cropImg = this.$refs.cropper.getCroppedCanvas().toDataURL();
            console.log(this.cropImg);
            this.image=this.urltofile(this.cropImg, 'sample.jpeg');
            console.log(this.image);
            let form = new FormData();
            form.append('name',this.name);
            form.append('image',this.image);

            axios.post('api/dummy', form)
                    .then(response => {
                    alert('URL Added');
                    this.loading=false;
                    this.returnimage=response.data.url;
                    this.imageshow=true;
                    this.returnobject=response.data;
                    console.log('url is here '+ response.data);
                    this.name='';
                    this.image='';
                 
             })
        },

        urltofile(dataurl, filename) {
            var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
                bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
                while(n--){
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new File([u8arr], filename, {type:mime});
            },

        handleimage(e){            
            this.image=e.target.files[0];
            console.log(this.image);
            this.previewimage(e);
        },

        handlecrop(e){            
            this.newimage=e.target.files[0];
            //console.log(this.image);
        },

        cropImage() {
        // get image data for post processing, e.g. upload or setting image src
        this.showcrop=true;
        this.cropImg = this.$refs.cropper.getCroppedCanvas().toDataURL();
        //console.log(this.cropImg);
        //this.image=this.$refs.cropper;
      },

        previewimage(event) {

            // Reference to the DOM input element
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.imagedata = e.target.result;
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
}
</script>