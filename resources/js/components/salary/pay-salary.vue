<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Pay Salary</h1>
                                </div>
                                <form class="user" @submit.prevent="paySalary" enctype="multipart/form-data">
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
                                                <label> Salary</label>
                                                <input type="text" v-model="form.salary" class="form-control" id="exampleInputFirstName" required>

                                            </div>

                                            <div class="col-md-6">
                                                <label> Month</label>
                                                <select class="form-control mb-3" v-model="form.month">
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>

                                                </select>

                                            </div>


                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <button style="width:100px;" type="submit" class="btn btn-primary">Pay Now</button>

                                            <router-link to="/all-employee" class="btn btn-info text-center float-right ml-2">Salary List</router-link>
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
                axios.get('/api/employee/'+id)
                    .then(({data}) =>(this.form = data))
                    .catch(console.log(error))
            }
        },
        data(){
            return{
                form:{
                    name:'',
                    email:'',
                    salary:'',
                    month:''

                },
                errors:{}

            }
        },
        methods:{

            paySalary(){
                let id = this.$route.params.id
                axios.post('/api/salary/paid/'+id,this.form)
                    .then(()=> {

                      //  this.$router.push('/all-employee')
                        Notification.update()



                    })
                    .catch(error => this.errors = error.response.data.errors)
            }
        }
    }
</script>

<style scoped>

</style>
