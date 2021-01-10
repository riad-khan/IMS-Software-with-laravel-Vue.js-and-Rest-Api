<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Employees List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item">Employees</li>
                <li class="breadcrumb-item active" aria-current="page">All-Employees</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 flex-row justify-content-between">

                        <input type="text" class="form-control float-right " v-model="searchTerm" style="width: 350px" placeholder="Search Employee Here"><br>
                    </div>


                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>



                                <th>Salary</th>
                                <th>Joining Date</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="employee in filterSearch" :key="employee.id">
                                <td>{{ employee.name }}</td>
                                <td>{{ employee.email }}</td>



                                <td>{{ employee.salary }}</td>
                                <td>{{ employee.date }}</td>
                                <td>
                                    <router-link :to="{name:'pay_salary',params:{id:employee.id}}" class="btn btn-sm btn-primary">Pay Salary</router-link>

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                        <div class="row justify-content-center">
                            <router-link to="/view-salary" class="btn btn-primary text-center">Salary List</router-link>
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
                employees:[],
                searchTerm:'',
            }
        },
        computed:{
            filterSearch(){
                return this.employees.filter(employee => {
                    return employee.name.match(this.searchTerm)
                })
            }
        },
        methods:{
            allEmployees(){
                axios.get('/api/employee/')
                    .then(({data}) =>(this.employees = data))
                    .catch()
            },
            deleteEmployee(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/employee/'+id)
                            .then(() => {
                                this.employees = this.employees.filter(employee => {
                                    return employee.id != id
                                    this.$router.push({name: '/all-employee'})
                                })
                            })
                            .catch()
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            }

        },
        created(){
            this.allEmployees();
        }
    }
</script>

<style scoped>

</style>
