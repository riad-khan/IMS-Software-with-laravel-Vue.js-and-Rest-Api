<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Products List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active" aria-current="page">All-Products</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 flex-row justify-content-between">

                        <input type="text" class="form-control float-right " v-model="searchTerm" style="width: 350px" placeholder="Search by Product Code"><br>
                    </div>


                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Category</th>
                                <th>Supplier Name</th>
                                <th> In Stock</th>
                                <th>Buying Price</th>
                                <th>selling Price</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="product in filterProducts" :key="product.id">
                                <td>{{ product.product_code }}</td>
                                <td>{{ product.product_name }}</td>
                                <td><img :src="product.product_image" style="width: 40px;height: 40px;"></td>
                                <td>{{ product.name }}</td>
                                <td>{{ product.sname }}</td>
                                <td>{{ product.product_quantity }}</td>
                                <td>{{ product.buying_price }}</td>
                                <td>{{ product.selling_price }}</td>


                                <td>
                                 <router-link :to="{name:'EditProduct',params:{id:product.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                    <a @click="deleteProduct(product.id)" style="color: white" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                        <div class="row justify-content-center">
                            <router-link to="/add-product" class="btn btn-primary text-center">Add New Product</router-link>
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
                axios.get('/api/products/')
                .then(({data})=>(this.products = data))
                .catch()
            }
        },
        data(){
            return{
                products:[],
                searchTerm:'',
            }
        },
        computed:{
            filterProducts(){
                return this.products.filter(product =>{
                    return product.product_code.match(this.searchTerm)
                })
            }
        },

        methods:{
            deleteProduct(id){
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

                        axios.delete('/api/products/'+id)
                            .then(()=>{
                                this.products = this.products.filter(product =>{
                                    return product.id != id
                                    this.$router.push('/all-product')
                                })
                            })
                            .catch(error)
                        Swal.fire(
                            'Deleted!',
                            'Your product has been deleted.',
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
