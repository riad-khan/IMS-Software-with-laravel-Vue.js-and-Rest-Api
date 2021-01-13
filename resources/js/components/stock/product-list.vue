<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Products Stock</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active" aria-current="page">Products-stock</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 flex-row justify-content-between">

                        <input type="text" class="form-control float-right " v-model="searchTerm" style="width: 350px" placeholder="Search Products"><br>
                    </div>


                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Image</th>

                                <th>Quantity</th>
                                <th>Status</th>
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


                                <td>{{ product.product_quantity }}</td>
                                <td v-if="product.product_quantity >=1"><span class="badge badge-success">Available</span></td>
                                <td v-else=" "><span class="badge badge-danger">Stock out</span></td>
                                <td>{{ product.buying_price }}</td>
                                <td>{{ product.selling_price }}</td>


                                <td>
                                    <router-link :to="{name:'update_stock',params:{id:product.id}}" class="btn btn-sm btn-primary">update stock</router-link>

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">



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
                axios.get('/api/stock/')
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
                    return product.product_name.toUpperCase().match(this.searchTerm.toUpperCase())
                })
            }
        },

        methods:{

        },

    }
</script>

<style scoped>

</style>
