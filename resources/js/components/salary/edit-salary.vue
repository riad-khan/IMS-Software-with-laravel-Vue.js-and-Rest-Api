<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Update Salary</h1>
                                </div>
                                <form class="user" @submit.prevent="salaryUpdate" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Name</label>
                                                <input type="text" v-model="form.employee_name" class="form-control" id="exampleInputFirstName" readonly>

                                            </div>

                                            <div class="col-md-6">
                                                <label> Email</label>
                                                <input type="text" v-model="form.employee_email" class="form-control" id="exampleInputFirstName" readonly>

                                            </div>
                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Salary</label>
                                                <input type="text" v-model="form.amount" class="form-control" id="exampleInputFirstName"readonly>

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
                                            <button style="width:120px;" type="submit" class="btn btn-primary">update Now</button>


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
        created() {
            if (!User.loggedIn()){
                this.$router.push('/')
            }else{
                let id = this.$route.params.id
                axios.get('/api/salary/edit/'+id)
                .then(({data}) => (this.form = data))
                    .catch(error => {
                        console.log(error.response.data.error)
                    })
            }
        },

        data(){
          return{
              form:{
                  employee_name:'',
                  employee_email:'',
                  amount:'',
                  month:''
              }
          }
      },
        methods:{
            salaryUpdate(){
                let id = this.$route.params.id
                axios.patch('/api/salary/update/'+id,this.form)
                .then(() =>{
                    Notification.update()

                    this.$router.push('/view-salary')
                })
            }
        },

    }
</script>

<style scoped>

</style>
