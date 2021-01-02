<template>
   <div>

       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800">Employees List</h1>
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
                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                       <h6 class="m-0 font-weight-bold text-primary">Employees List</h6>
                   </div>
                   <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                           <thead class="thead-light">
                           <tr>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Photo</th>
                               <th>phone</th>
                               <th>Nid</th>
                               <th>Salary</th>
                               <th>Joining Date</th>
                               <th>Action</th>

                           </tr>
                           </thead>
                           <tbody>
                           <tr v-for="employee in employees" :key="employee.id">
                               <td>{{ employee.name }}</td>
                               <td>{{ employee.email }}</td>
                               <td><img :src="employee.photo" style="width: 40px;height: 40px;"></td>
                               <td>{{ employee.phone }}</td>
                               <td>{{ employee.nid }}</td>
                               <td>{{ employee.salary }}</td>
                               <td>{{ employee.date }}</td>
                               <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                           </tr>

                           </tbody>
                       </table>
                   </div>
                   <div class="card-footer"></div>
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
            }
        },
        methods:{
            allEmployees(){
                axios.get('/api/employee/')
                .then(({data}) =>(this.employees = data))
                .catch()
            },

        },
        created(){
            this.allEmployees();
        }
    }
</script>

<style scoped>

</style>
