<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Salary List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item">Salary</li>
                <li class="breadcrumb-item active" aria-current="page">Salary List</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 flex-row justify-content-between">

                        <input type="text" class="form-control float-right " v-model="searchTerm" style="width: 350px" placeholder="Search By Employee ID"><br>
                    </div>


                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Month</th>
                                <th>Salary</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="salary in filterSearch" :key="salary.id">
                                <td>{{ salary.employee_id }}</td>
                                <td>{{ salary.employee_name }}</td>
                                <td>{{ salary.employee_email }}</td>
                                <td>{{ salary.month }}</td>
                                <td>{{ salary.amount }}</td>
                                <td>
                              <router-link :to="{name:'edit_salary',params:{id:salary.id}}" class="btn btn-sm btn-primary">Edit Details</router-link>

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <router-link to="/view-salary" class="btn btn-primary text-center">Salary List</router-link>
                            </div>

                            <div class="col-md-6">
                                <h5 class="justify-content-center text-center">Total:&nbsp;{{ total }} TK</h5>
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
        created(){
            if(!User.loggedIn()){
                this.$router.push('/')
            }
        },
        data(){
            return{
                salaries:[],
                total:'',
                searchTerm:''
            }
        },
        computed:{
            filterSearch(){
                return this.salaries.filter(salary => {
                    return salary.employee_name.toUpperCase().includes(this.searchTerm.toUpperCase())
                })
            }
        },

        methods:{
            allSalaries(){
                let id = this.$route.params.id
                axios.get('/api/salary/list/'+id)
                    .then(({data}) =>(this.salaries = data))
                    .catch()
                axios.get('/api/salary/total/'+id)
                .then(({data})=>(this.total = data))
                .catch()
            },


        },
        created(){
            this.allSalaries();
        }
    }
</script>

<style scoped>

</style>
