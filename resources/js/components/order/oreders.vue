<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Orders</h1>
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
                        <input type="text" class="form-control float-right " v-model="searchTerm" style="width: 350px" placeholder="Search By Date e.g: 20/1/2021"><br>
                    </div>



                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Todays Order</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Monthly Orders</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="contact" aria-selected="false">All Orders</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Payment Method</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="order in filterProducts" :key="order.id">
                                    <td>{{ order.id }}</td>
                                    <td>{{ order.customer_name }}</td>
                                    <td>{{ order.total }}</td>
                                    <td>{{ order.pay }}</td>
                                    <td>{{ order.due }}</td>
                                    <td>{{ order.pay_by }}</td>
                                    <td>{{ order.order_date }}</td>
                                    <td>
                                        <span data-v-f2b6376c="" v-if="order.order_status ==='shipping'" class="badge badge-warning">{{ order.order_status }}</span>
                                        <span data-v-f2b6376c="" v-else-if="order.order_status ==='processing'" class="badge badge-info">{{ order.order_status }}</span>
                                        <span data-v-f2b6376c="" v-else-if="order.order_status ==='Delivered'" class="badge badge-success">{{ order.order_status }}</span>
                                        <span data-v-f2b6376c="" v-else-if="order.order_status ==='cancelled'" class="badge badge-danger">{{ order.order_status }}</span>


                                    </td>



                                    <td>
                                        <router-link :to="{name:'order_status',params:{id:order.id}}" class="btn btn-sm btn-primary">update Status</router-link>
                                        <router-link :to="{name:'Order-details',params:{id:order.id}}" class="btn btn-sm btn-primary">Details</router-link>

                                    </td>
                                </tr>

                                </tbody>
                            </table>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Due</th>
                                        <th>Payment Method</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="month in monthlyOrders" :key="month.id">
                                        <td>{{ month.id }}</td>
                                        <td>{{ month.customer_name }}</td>
                                        <td>{{ month.total }}</td>
                                        <td>{{ month.pay }}</td>
                                        <td>{{ month.due }}</td>
                                        <td>{{ month.pay_by }}</td>
                                        <td>{{ month.order_date }}</td>
                                        <td>
                                            <span data-v-f2b6376c="" v-if="month.order_status ==='shipping'" class="badge badge-warning">{{ month.order_status }}</span>
                                            <span data-v-f2b6376c="" v-else-if="month.order_status ==='processing'" class="badge badge-info">{{ month.order_status }}</span>
                                            <span data-v-f2b6376c="" v-else-if="month.order_status ==='Delivered'" class="badge badge-success">{{ month.order_status }}</span>
                                            <span data-v-f2b6376c="" v-else-if="month.order_status ==='cancelled'" class="badge badge-danger">{{ month.order_status }}</span>


                                        </td>



                                        <td>
                                            <router-link :to="{name:'order_status',params:{id:month.id}}" class="btn btn-sm btn-primary">update Status</router-link>
                                            <router-link :to="{name:'Order-details',params:{id:month.id}}" class="btn btn-sm btn-primary">Details</router-link>

                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>



                        </div>

                        <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Due</th>
                                        <th>Payment Method</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="order in allorders" :key="order.id">
                                        <td>{{ order.id }}</td>
                                        <td>{{ order.customer_name }}</td>
                                        <td>{{ order.total }}</td>
                                        <td>{{ order.pay }}</td>
                                        <td>{{ order.due }}</td>
                                        <td>{{ order.pay_by }}</td>
                                        <td>{{ order.order_date }}</td>
                                        <td>
                                            <span data-v-f2b6376c="" v-if="order.order_status ==='shipping'" class="badge badge-warning">{{ order.order_status }}</span>
                                            <span data-v-f2b6376c="" v-else-if="order.order_status ==='processing'" class="badge badge-info">{{ order.order_status }}</span>
                                            <span data-v-f2b6376c="" v-else-if="order.order_status ==='Delivered'" class="badge badge-success">{{ order.order_status }}</span>
                                            <span data-v-f2b6376c="" v-else-if="order.order_status ==='cancelled'" class="badge badge-danger">{{ order.order_status }}</span>


                                        </td>



                                        <td>
                                            <router-link :to="{name:'order_status',params:{id:order.id}}" class="btn btn-sm btn-primary">update Status</router-link>
                                            <router-link :to="{name:'Order-details',params:{id:order.id}}" class="btn btn-sm btn-primary">Details</router-link>

                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>



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
                this.Order()
                this.thisWeek()
                this.thisMonth()
                this.all()
            }
        },
        data(){
            return{
                orders:[],
                searchTerm:'',
                errors:{},
                weeks:[],
                months:[],
                allOrders:[],
            }
        },
        computed:{
            filterProducts(){
                return this.orders.filter(order =>{
                    return order.order_date.match(this.searchTerm)
                })
            },

            weeklyOrders(){
                return this.weeks.filter(week =>{
                    return week.order_date.match(this.searchTerm)
                })
            },

            monthlyOrders(){
                return this.months.filter(month =>{
                    return month.order_date.match(this.searchTerm)
                })
            },
            allorders(){
                return this.allOrders.filter(allOrder =>{
                    return allOrder.order_date.match(this.searchTerm)
                })
            },
        },

        methods:{

            Order(){
                axios.get('/api/todays-orders')
                    .then(({data})=>(this.orders = data))
                    .catch(error => this.errors = error.response.data.errors)
            },

            thisWeek(){
                axios.get('/api/this-weeks-orders')
                    .then(({data})=>(this.weeks = data))
                    .catch(error => this.errors = error.response.data.errors)
            },

            thisMonth(){
                axios.get('/api/this-months-orders')
                    .then(({data})=>(this.months = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            all(){
                axios.get('/api/all')
                    .then(({data})=>(this.allOrders = data))
                    .catch(error => this.errors = error.response.data.errors)
            }


        },

    }
</script>

<style scoped>

</style>
