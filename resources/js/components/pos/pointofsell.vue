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
                            <div class="col-sm -6">
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


                                    <div class="row">

                                          <div class="col col-lg-2" v-for="product in filterProducts" :key="product.id">
                                              <button class="btn btn-sm" v-if="product.product_quantity <=1" @click.prevent="stockCheck()" >
                                                  <div class="card" style="width: 8.5rem; margin-bottom: 5px; height: 210px;">
                                                      <img :src="product.product_image" id="em_photo" class="card-img-top">
                                                      <div class="card-body">
                                                          <h6 class="card-title">{{ product.product_name.substring(0,11)+".." }}</h6>
                                                          <span class="badge badge-success" v-if="product.product_quantity  >= 1 ">Available {{ product.product_quantity }} pcs  </span>
                                                          <span class="badge badge-danger" v-else="">Stock Out </span>

                                                      </div>
                                                  </div></button>


                                              <button class="btn btn-sm" v-else @click.prevent="AddToCart(product.id)">
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

                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card-body">


                                    <div class="row">
                                        <div class="col col-lg-2" v-for="getProduct in getFilterProducts" :key="getProduct.id">
                                            <button class="btn btn-sm" v-if="getProduct.product_quantity <=1" @click.prevent="stockCheck()" >
                                                  <div class="card" style="width: 8.5rem; margin-bottom: 5px; height: 210px;">
                                                      <img :src="getProduct.product_image" id="em_photo" class="card-img-top">
                                                      <div class="card-body">
                                                          <h6 class="card-title">{{ getProduct.product_name.substring(0,11)+".." }}</h6>
                                                          <span class="badge badge-success" v-if="getProduct.product_quantity  >= 1 ">Available {{ getProduct.product_quantity }} pcs  </span>
                                                          <span class="badge badge-danger" v-else=" ">Stock Out </span>

                                                      </div>
                                                  </div>

                                                  </button>


                                                      <button class="btn btn-sm" v-else @click.prevent="AddToCart(getProduct.id)">
                                                  <div class="card" style="width: 8.5rem; margin-bottom: 5px; height: 210px;">
                                                      <img :src="getProduct.product_image" id="em_photo" class="card-img-top">
                                                      <div class="card-body">
                                                          <h6 class="card-title">{{ getProduct.product_name.substring(0,11)+".." }}</h6>
                                                          <span class="badge badge-success" v-if="getProduct.product_quantity  >=1 ">Available {{ getProduct.product_quantity }} pcs  </span>
                                                          <span class="badge badge-danger" v-else="">Stock Out </span>

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
                <div class="col-xl-4 col-lg-4 col-sm ">
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
                                            <th>price</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="cartProduct in cartProducts" :key="cartProduct.id">
                                            <td><a style="font-size: 14px;">{{ cartProduct.product_name }}</a></td>
                                            <td><input type="text" readonly  style="width: 15px;" :value="cartProduct.qty">
                                            <button class="btn btn-sm" @click.prevent="increment(cartProduct.id)"  style="padding-right: 0px;padding-left: 0px;width: 15px;" >+</button>
                                                <button class="btn btn-sm" @click.prevent="decrement(cartProduct.id)" v-if="cartProduct.qty >= 2" style="padding-right: 0px;padding-left: 0px;">-</button>
                                                  <button class="btn btn-sm"  v-else='' disabled style="padding-right: 0px;padding-left: 0px;">-</button>
                                            </td>
                                            <td>{{ cartProduct.product_price }}</td>
                                            <td>{{ cartProduct.subtotal }}</td>
                                            <td><button @click.prevent="removeCart(cartProduct.id)" type="button" class="close" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button></td>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">

                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity:
                                            <strong>{{ qty }}</strong>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total:
                                            <strong>{{ subtotal }} TK</strong>
                                        </li>


                                        <li class="list-group-item d-flex justify-content-between align-items-center">Vat:
                                            <input type="text"  class="form-control" v-model="vat" style="width: 50px;" required>
                                            <small class="text-danger" v-if="errors.vat"> {{ errors.vat[0] }} </small>

                                        </li>

                                        <li class="list-group-item d-flex justify-content-between align-items-center">Total amount:
                                            <strong>{{ subtotal*vat /100 + subtotal }} TK</strong>
                                        </li>
                                    </ul>
                                    <br>

                                    <form @submit.prevent="orderDone">
                                        <label>Customer Name</label>
                                        <select class="form-control" v-model="customer_id" required >

                                            <option :value="getCustomer.id" v-for="getCustomer in getCustomers" :key="getCustomer.id">{{getCustomer.customer_name}}</option>

                                        </select>

                                        <label>Pay By</label>
                                        <select class="form-control" v-model="pay_by" required>

                                            <option value="Hand Cash">Hand Cash</option>


                                        </select>

                                        <label>pay</label>
                                        <input type="text" class="form-control" v-model="pay" required ><br>

                                        <label>Due</label>
                                        <input type="text" :value="due" class="form-control" ><br>

                                        <div class="row justify-content-center">
                                            <button style="width:120px;" type="submit"  class="btn btn-primary" >Confirm</button>
                                            <router-link  to="/print" style="width:120px"  class="btn btn-success ml-5 float-right">Print</router-link>

                                        </div>



                                        <!---Modal -->


                                        <!-- Modal -->


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
    import Print from "../print";
    export default {
        components: {Print},
        created(){
            if(!User.loggedIn()){
                this.$router.push('/')
            }
        },
        created(){
            this.allProduct()
            this.allCategory()
            this.getCustomer()
            this.getCart()

            Reload.$on('CartReload',() =>{
                this.getCart();
            })
        },
        data(){
            return{
                products:[],


                    pay_by:'',
                    pay:0,
                    dues:0,
                customer_id:'',

                searchTerm:'',
                categories:'',
                getCustomers:'',
                getProducts:[],
                customer_id:'',
                cartProducts:[],
                vat:'',
                errors:{}
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
            },
            qty(){
                let sum = 0
                for(let i = 0; i < this.cartProducts.length; i++){

                    sum += (parseFloat(this.cartProducts[i].qty))
                }
                return sum
            },
            subtotal(){
                let count = 0
                for(let x =0; x < this.cartProducts.length; x++){
                    count +=(parseFloat(this.cartProducts[x].qty) * parseFloat(this.cartProducts[x].product_price))
                }
                return count
            },
            due:function () {
                let calculateDue = this.subtotal * this.vat / 100 + this.subtotal - this.pay

                this.dues = calculateDue

                return calculateDue
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
            getCustomer(){
                axios.get('/api/customer/')
                .then(({data}) =>(this.getCustomers = data))
                    .catch(error => this.errors = error.response.data.errors)
            },


            AddToCart(id){
                axios.get('/api/cartProducts/'+id)
                .then(() =>{
                    Reload.$emit('CartReload')
                    Notification.cart()
                })
                    .catch(error => this.errors = error.response.data.errors)
            },
            getCart(){
                    axios.get('/api/getCart/')
                    .then(({data}) => (this.cartProducts = data))
                        .catch()
            },
            stockCheck(){
                    Notification.stock()
            },
            removeCart(id){
                    axios.get('/api/remove/cart/'+id)
                    .then(()=>{
                        Reload.$emit('CartReload')
                        Notification.remove()
                    })
                        .catch(error => this.errors = error.response.data.errors)
            },
            increment(id){
                axios.get('/api/cart/product/increment/'+id)
                .then(()=>{
                    Reload.$emit('CartReload')
                })
                    .catch(error => this.errors = error.response.data.errors)
            },
            decrement(id){
                axios.get('/api/cart/product/decrement/'+id)
                .then(()=>{
                    Reload.$emit('CartReload')
                })
            },
            orderDone(){
                    let total = this.subtotal*this.vat /100 + this.subtotal
                var data = {
                        customer_id : this.customer_id,
                        qty:this.qty,
                        subtotal : this.subtotal,
                        vat : this.vat,
                        total : total,
                        pay : this.pay,
                        dues: this.dues,
                        pay_by : this.pay_by
                }



                    axios.post('/api/orderDone',data)
                        .then(()=>{

                            this.$router.push('/home')

                            Notification.success()

                        })
                        .catch(error => this.errors = error.response.data.errors)


            }



        },

    }
</script>

<style scoped>
    #photo{
        width: 40px;
        height:40px;
    }
</style>
