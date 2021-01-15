<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Customer List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item">Customer</li>
                <li class="breadcrumb-item active" aria-current="page">All-Customers</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 flex-row justify-content-between">

                        <input type="text" class="form-control float-right " v-model="searchTerm" style="width: 350px" placeholder="Search Customer Here"><br>
                    </div>


                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>phone</th>

                                <th>Address</th>

                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="customer in filterCustomer" :key="customer.id">
                                <td>{{ customer.customer_name }}</td>
                                <td>{{ customer.customer_email }}</td>
                                <td><img :src="customer.image" style="width: 40px;height: 40px;"></td>
                                <td>{{ customer.phone_number }}</td>

                                <td>{{ customer.address }}</td>

                                <td>
                                    <router-link :to="{name:'editCustomer',params:{id:customer.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                    <a @click="deleteCustomers(customer.id)" style="color: white" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                        <div class="row justify-content-center">
                            <router-link to="/create-customer" class="btn btn-primary text-center">Add New Customer</router-link>
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
            }else{
                axios.get('/api/customer/')
                    .then(({data})=>(this.customers = data))
                    .catch()
            }
        },
        data(){
            return{
                customers:[],
                searchTerm:'',
            }
        },

        computed:{
            filterCustomer(){
                return this.customers.filter(customer =>{
                    return customer.customer_name.toUpperCase().match(this.searchTerm.toUpperCase())
                })
            }
        },

        methods:{

            deleteCustomers(id){
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

                        axios.delete('/api/customer/'+id)
                            .then(()=>{
                                this.customers = this.customers.filter(customer =>{
                                    return customer.id != id
                                    this.$router.push({name: '/allCustomer'})
                                })
                            })
                            .catch(error)
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
        },


    }
</script>

<style scoped>

</style>
