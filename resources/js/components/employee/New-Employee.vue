<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add New Employee</h1>
                                </div>
                                <form class="user" @submit.prevent="employeeInsert" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Name</label>
                                                <input type="text" v-model="form.name" class="form-control" id="exampleInputFirstName"  required>

                                            </div>

                                            <div class="col-md-6">
                                                <label> Email</label>
                                                <input type="text" v-model="form.email" class="form-control" id="exampleInputFirstName"  required>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Phone</label>
                                                <input type="text" v-model="form.phone" class="form-control" id="exampleInputFirstName"  required>

                                            </div>

                                            <div class="col-md-6">
                                                <label> National ID</label>
                                                <input type="text" v-model="form.nid" class="form-control" id="exampleInputFirstName"  required>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Salary</label>
                                                <input type="text" v-model="form.salary" class="form-control" id="exampleInputFirstName" required>

                                            </div>

                                            <div class="col-md-6">
                                                <label> Joining Date</label>
                                                <input type="date" v-model="form.date" class="form-control" id="exampleInputFirstName" required>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                        </div>
                                            <div class="col-md-6">
                                                <img :src="form.photo" width="50px;" height="50px;">
                                            </div>
                                    </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
                    name: null,
                    email:null,
                    phone:null,
                    nid:null,
                    salary:null,
                    date:null,
                    photo:null
                },
                errors:{}

            }
        },
        methods:{
            onFileSelected(event){
                let file = event.target.files[0];
                if(file.size > 1048770){
                Notification.image_validation()
                }else{
                    let reader = new FileReader();
                    reader.onload = event =>{
                        this.form.photo = event.target.result
                        console.log(event.target.result)
                    };
                    reader.readAsDataURL(file);
                }
            },
            employeeInsert(){
                axios.post('/api/employee',this.form)
                    .then(()=> {

                        this.$router.push('/all-employee')
                        Notification.success()



                    })
                    .catch(error => this.errors = error.response.data.errors)
            }
        }
    }
</script>

<style scoped>

</style>
