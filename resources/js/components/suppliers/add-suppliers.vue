<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add New Supplier</h1>
                                </div>
                                <form class="user" @submit.prevent="supplierInsert" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Name</label>
                                                <input type="text" v-model="form.sname" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
                                            </div>

                                            <div class="col-md-6">
                                                <label> Email</label>
                                                <input type="text" v-model="form.email" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Phone</label>
                                                <input type="text" v-model="form.phone" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.phone"> {{ errors.phone[0] }} </small>
                                            </div>

                                            <div class="col-md-6">
                                                <label> National ID</label>
                                                <input type="text" v-model="form.nid" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.nid"> {{ errors.nid[0] }} </small>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Address</label>
                                                <input type="text" v-model="form.address" class="form-control" id="exampleInputFirstName" required>
                                                <small class="text-danger" v-if="errors.address"> {{ errors.address[0] }} </small>
                                            </div>

                                            <div class="col-md-6">
                                                <label> Shop name</label>
                                                <input type="text" v-model="form.shop" class="form-control" id="exampleInputFirstName" required>
                                                <small class="text-danger" v-if="errors.shop"> {{ errors.shop[0] }} </small>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" @change="imageSelect">
                                                    <small class="text-danger" v-if="errors.photo"> {{ errors.photo[0] }} </small>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img :src="form.photo" width="50px;" height="50px;">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <button style="width:100px;" type="submit" class="btn btn-primary">Submit</button>

                                            <router-link to="/all-employee" class="btn btn-info text-center float-right ml-2">Employees List</router-link>
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
            }
        },
        data(){
            return{
                form:{
                    sname: null,
                    email:null,
                    phone:null,
                    nid:null,
                    address:null,
                    shop:null,
                    photo:null
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
                        this.form.photo = event.target.result
                    }
                    reader.readAsDataURL(image);
                }
            },
            supplierInsert(){
                axios.post('/api/suppliers',this.form)
                .then(() =>{
                    this.$router.push('/all-supplier')
                    Notification.success()

                })
                    .catch(error => this.errors = error.response.data.errors)
            }
        }
    }
</script>

<style scoped>

</style>
