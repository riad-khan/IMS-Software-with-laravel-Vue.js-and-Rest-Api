<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Supplier List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item">Supplier</li>
                <li class="breadcrumb-item active" aria-current="page">All-Suppliers</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 flex-row justify-content-between">

                        <input type="text" class="form-control float-right " v-model="searchTerm" style="width: 350px" placeholder="Search Suppliers Here"><br>
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
                                <th>Address</th>
                                <th>Shop</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="supplier in filterSuppliers" :key="supplier.id">
                                <td>{{ supplier.sname }}</td>
                                <td>{{ supplier.email }}</td>
                                <td><img :src="supplier.photo" style="width: 40px;height: 40px;"></td>
                                <td>{{ supplier.phone }}</td>
                                <td>{{ supplier.nid }}</td>
                                <td>{{ supplier.address }}</td>
                                <td>{{ supplier.shop }}</td>
                                <td>
                                    <router-link :to="{name:'EditSuppliers',params:{id:supplier.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                    <a @click="deleteSuppliers(supplier.id)" style="color: white" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                        <div class="row justify-content-center">
                            <router-link to="/add-supplier" class="btn btn-primary text-center">Add New Supplier</router-link>
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
                suppliers:[],
                searchTerm:'',
            }
        },

        computed:{
         filterSuppliers(){
             return this.suppliers.filter(supplier =>{
                 return supplier.sname.match(this.searchTerm)
             })
         }
        },

        methods:{
            Allsuppliers(){
                axios.get('/api/suppliers/')
                .then(({data})=>(this.suppliers = data))
                .catch()
            },
            deleteSuppliers(id){
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

                        axios.delete('/api/suppliers/'+id)
                        .then(()=>{
                            this.suppliers = this.suppliers.filter(supplier =>{
                                return supplier.id != id
                                this.$router.push('/all-supplier')
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
        created(){
            this.Allsuppliers();
        }

    }
</script>

<style scoped>

</style>
