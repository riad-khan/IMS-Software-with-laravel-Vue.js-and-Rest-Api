<template>
    <div>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">POS Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pos</li>
                </ol>
            </div>

            <div class="row mb-3">
                <!-- Earnings (Monthly) Card Example -->


                <!-- product Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header py-3 flex-row justify-content-between">

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="color: #1d68a7">Product list</h4>

                                </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control float-right " v-model="searchTerm" style="width: 350px" placeholder="Search Products"><br>
                            </div>
                            </div>

                        </div>
                    <!--- Tab Bar --->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Products</a>
                            </li>
                            <li class="nav-item" v-for="category in categories" :key="category.id">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" @click="categorisedProduct(category.id)" aria-controls="profile" aria-selected="false">{{category.name}}</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="card-body">

                                    <a href="#">
                                    <div class="row">

                                          <div class="col col-lg-2" v-for="product in filterProducts" :key="product.id">
                                              <button class="btn btn-sm">
                                                  <div class="card" style="width: 8.5rem; margin-bottom: 5px; height: 210px;">
                                                      <img :src="product.product_image" id="em_photo" class="card-img-top">
                                                      <div class="card-body">
                                                          <h6 class="card-title">{{ product.product_name.substring(0,11)+".." }}</h6>
                                                          <span class="badge badge-success" v-if="product.product_quantity  >= 1 ">Available {{ product.product_quantity }} pcs  </span>
                                                          <span class="badge badge-danger" v-else=" ">Stock Out </span>

                                                      </div>
                                                  </div></button>

                                          </div>

                                    </div>
                                    </a>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card-body">


                                    <div class="row">
                                        <div class="col col-lg-2" v-for="getProduct in getFilterProducts" :key="getProduct.id">
                                            <button class="btn btn-sm">
                                                <div class="card" style="width: 8.5rem; margin-bottom: 5px; height: 210px;">
                                                    <img :src="getProduct.product_image" id="em_photo" class="card-img-top">
                                                    <div class="card-body">
                                                        <h6 class="card-title">{{ getProduct.product_name.substring(0,11)+".." }}</h6>
                                                        <span class="badge badge-success" v-if="getProduct.product_quantity  >= 1 ">Available {{ getProduct.product_quantity }} pcs  </span>
                                                        <span class="badge badge-danger" v-else=" ">Stock Out </span>

                                                    </div>
                                                </div></button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                   <!--- tab bar ends -->


                    </div>
                </div>
                <!-- cart Box -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Products Cart</h6>
                            <a class="btn btn-info btn-sm color" ><font color="white">Add Customer</font></a>
                        </div>



                        <!--cart body starts From Here -->


                                <div class="table-responsive"style="font-size: 13px;">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Unit</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#">Name</a></td>
                                            <td>Qty</td>
                                            <td>Unit</td>
                                            <td>Total</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">X</a></td>
                                        </tr>

                                        <tr>
                                            <td><a href="#">Name</a></td>
                                            <td>Qty</td>
                                            <td>Unit</td>
                                            <td>Total</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">X</a></td>
                                        </tr>

                                        <tr>
                                            <td><a href="#">Name</a></td>
                                            <td>Qty</td>
                                            <td>Unit</td>
                                            <td>Total</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">X</a></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">

                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity:
                                            <strong>56</strong>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total:
                                            <strong>1000 TK</strong>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">Delivery Charge:
                                            <strong>50 Tk</strong>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">Total amount:
                                            <strong>1106 TK</strong>
                                        </li>
                                    </ul>
                                    <br>

                                    <form>
                                        <label>Customer Name</label>
                                        <select class="form-control" v-model="customer_id">

                                            <option value="Riad Khan">Riad khan</option>
                                        </select>

                                        <label>Pay</label>
                                        <select class="form-control" v-model="pay">

                                            <option value="Hand Cash">Hand Cash</option>
                                            <option value="Hand Cash">Cheque</option>
                                            <option value="Cash on Delivery">Cash on Delivery</option>
                                        </select>

                                        <label>Due</label>
                                        <input type="text" class="form-control" v-model="due"><br>

                                        <div class="row justify-content-center">
                                            <button style="width:140px;" type="submit"  class="btn btn-primary">Order Products</button>


                                        </div>
                                    </form>

                                </div>

                        <!--cart body ends Here-->


                    </div>
                </div>

            </div>
            <!--Row-->



        </div>
        <!---Container Fluid-->
    </div>
</template>

<script>
    export default {
        created(){
            if(!User.loggedIn()){
                this.$router.push('/')
            }else{
               this.allProduct()
                this.allCategory()
            }
        },
        data(){
            return{
                products:[],
                searchTerm:'',
                categories:'',

                getProducts:[],
            }
        },
        computed:{
            filterProducts(){
                return this.products.filter(product =>{
                    return product.product_name.toUpperCase().match(this.searchTerm.toUpperCase())
                })
            },

            getFilterProducts(){
                return this.getProducts.filter(getProduct =>{
                    return getProduct.product_name.toUpperCase().match(this.searchTerm.toUpperCase())
                })
            }
        },

        methods:{
                allProduct(){
                    axios.get('/api/products/')
                        .then(({data})=>(this.products = data))
                .catch(error => this.errors = error.response.data.errors)
                },

                allCategory(){
                    axios.get('/api/category/')
                        .then(({data}) =>(this.categories = data))
                        .catch(error => this.errors = error.response.data.errors)
                },
            categorisedProduct(id){
                axios.get('/api/categorised/'+id)
                .then(({data}) =>(this.getProducts = data))
                .catch(error => this.errors = error.response.data.errors)
            },

        },

    }
</script>

<style scoped>
    #photo{
        width: 40px;
        height:40px;
    }
</style>
