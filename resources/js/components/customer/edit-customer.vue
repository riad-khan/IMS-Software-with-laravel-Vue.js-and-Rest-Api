<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add New Customer</h1>
                                </div>
                                <form class="user" @submit.prevent="customerUpdate" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Name</label>
                                                <input type="text" v-model="form.customer_name" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.customer_name"> {{ errors.customer_name[0] }} </small>
                                            </div>

                                            <div class="col-md-6">
                                                <label> Email</label>
                                                <input type="text" v-model="form.customer_email" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.customer_email"> {{ errors.customer_email[0] }} </small>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Phone</label>
                                                <input type="text" v-model="form.phone_number" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.phone_number"> {{ errors.phone_number[0] }} </small>
                                            </div>

                                            <div class="col-md-6">
                                                <label> Address</label>
                                                <input type="text" v-model="form.address" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.address"> {{ errors.address[0] }} </small>
                                            </div>

                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" @change="imageSelect">
                                                    <small class="text-danger" v-if="errors.image"> {{ errors.image[0] }} </small>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img :src="form.image" width="50px;" height="50px;">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <button style="width:100px;" type="submit" class="btn btn-primary">Submit</button>

                                            <router-link to="/all-customer" class="btn btn-info text-center float-right ml-2">Customer List</router-link>
                                        </div>

                                    </div>

                                    <hr>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {
        created(){
            if(!User.loggedIn()){
                this.$router.push('/')
            }else{
                let id = this.$route.params.id
                axios.get('/api/customer/'+id)
                    .then(({data}) =>(this.form = data))
                    .catch(console.log(error))
            }
        },
        data(){
            return{
                form:{
                    customer_name:'',
                    customer_email:'',
                    phone_number:'',
                    address:'',
                    image:'',
                    newimage:''
                },
                errors:{}

            }
        },
        methods:{
            imageSelect(event){
                let image = event.target.files[0]
                if(image.size > 1048770){
                    Notification.image_validation()
                }else{
                    let reader = new FileReader()
                    reader.onload = event =>{
                        this.form.newimage = event.target.result
                    }
                    reader.readAsDataURL(image);
                }
            },
            customerUpdate(){
                let id = this.$route.params.id
                axios.patch('/api/customer/'+id,this.form)
                .then(()=>{
                    Notification.update()
                    this.$router.push('/all-customer')
                })
                    .catch(error => this.errors = error.response.data.errors)

            }

        }
    }
</script>

<style scoped>

</style>
