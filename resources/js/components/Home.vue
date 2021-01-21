<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="row mb-3">
            <!-- Earnings (todays) Card  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Sell (Todays)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ todaysSell }} Tk</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/total-sales-1.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (monthly) Card  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Sell (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ monthlySell }} Tk</div>

                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Earn</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{TotalErnings}} Tk</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/nolan/48/total-sales-1.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Dues</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{dues}} Tk</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/cash-.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Orders</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ totalOrder }}</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/clear-shopping-cart.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Orders Delivered</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ deliver }}</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/shipped.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Order In Queue</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ queues }}</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/deliver-food.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Order In Shipment</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ shipping }}</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/in-transit.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Employees</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ TotalEmployees }}</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/commercial-development-management.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Salary paid (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ monthlySalaries }} Tk</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/paycheque.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Salary paid (Year)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ yearlySalary }} Tk</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/cash-in-hand.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Salary paid (All time)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ totalSalaries }} Tk</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/british-pound.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Expense (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ expanses }} Tk</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/merchant-account.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Expenses (All time)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ TotalExpenses }} Tk</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/general-ledger.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Suppliers</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ suppliers }}</div>

                            </div>
                            <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/supplier.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-9 col-lg-5">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Best Selling Products</h6>

                    </div>
                    <div class="card-body" v-for="topSell in topSells">
                        <div class="mb-3">
                            <div class="small text-gray-500">{{topSell.product_name}}
                                <div class="small float-right"><b>{{topSell.total}} pcs</b></div>
                            </div>
                            <div class="progress" style="height: 12px;">
                                <div class="progress-bar bg-success" v-if="topSell.total >= 100" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" v-else-if="topSell.total >= 30" role="progressbar" style="width: 30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" v-else-if="topSell.total >= 50" role="progressbar" style="width: 50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" v-else-if="topSell.total >= 70" role="progressbar" style="width: 70%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" v-else-if="topSell.total >= 80" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" v-else-if="topSell.total >= 90" role="progressbar" style="width: 90%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>

                                <div class="progress-bar bg-danger" v-else-if="topSell.total < 10" role="progressbar" style="width: 5%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <a class="m-0 small text-primary card-link" href="#">View More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Area Chart -->

            <!-- Pie Chart -->


        </div>
        <!--Row-->


    </div>
</template>

<script>
    export default {

        data(){
            return{
                todaysSell:'',
                monthlySell:'',
                TotalErnings:'',
                dues:'',
                topSells:'',
                TotalEmployees:'',
                TotalExpenses:'',
                totalOrder:'',
                deliver:'',
                queues:'',
                suppliers:'',
                shipping:'',
                monthlySalaries:'',
                yearlySalary:'',
                totalSalaries:'',
                expanses:'',
                errors:{},
            }
        },

        mounted() {
            axios.post('/api/auth/checkToken')
            this.todaySell()
            this.monthSell()
            this.totalSell()
            this.totaldue()
            this.totalOrders()
            this.delivered()
            this.queue()
            this.shipment()
            this.employee()
            this.monthlySalary()
            this.yearsalary()
            this.totalSalary()
            this.expense()
            this.TotalExpense()
            this.supplier()
            this.topSell()

        },
        methods:{
            todaySell(){
                axios.get('/api/home-todays-sell')
                .then(({data})=>(this.todaysSell = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            monthSell(){
                axios.get('/api/home-monthly-sell')
                    .then(({data})=>(this.monthlySell = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            totalSell(){
                axios.get('/api/home-total-sell')
                    .then(({data})=>(this.TotalErnings = data))
                    .catch(error => this.errors = error.response.data.errors)
            },

            totaldue(){
                axios.get('/api/home-total-dues')
                    .then(({data})=>(this.dues = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            totalOrders(){
                axios.get('/api/home-total-orders')
                    .then(({data})=>(this.totalOrder = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            delivered(){
                axios.get('/api/home-delivered-orders')
                    .then(({data})=>(this.deliver = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            queue(){
                axios.get('/api/home-queue-orders')
                    .then(({data})=>(this.queues = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            shipment(){
                axios.get('/api/home-shipping-orders')
                    .then(({data})=>(this.shipping = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            employee(){
                axios.get('/api/home-employee-list')
                    .then(({data})=>(this.TotalEmployees = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            monthlySalary(){
                axios.get('/api/home-monthly-salary')
                    .then(({data})=>(this.monthlySalaries = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            yearsalary(){
                axios.get('/api/home-yearly-salary')
                    .then(({data})=>(this.yearlySalary = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            totalSalary(){
                axios.get('/api/home-total-salary')
                    .then(({data})=>(this.totalSalaries = data))
                    .catch(error => this.errors = error.response.data.errors)
            },
            expense(){
                axios.get('/api/home-monthly-expense')
                    .then(({data})=>(this.expanses = data))
                    .catch(error => this.errors = error.response.data.errors)

            },
            TotalExpense(){
                axios.get('/api/home-total-expense')
                    .then(({data})=>(this.TotalExpenses = data))
                    .catch(error => this.errors = error.response.data.errors)

            },
            supplier(){
                axios.get('/api/home-supplier')
                    .then(({data})=>(this.suppliers = data))
                    .catch(error => this.errors = error.response.data.errors)

            },
            topSell(){
                axios.get('/api/top-selling')
                    .then(({data})=>(this.topSells = data))
                    .catch(error => this.errors = error.response.data.errors)

            },
        }


    }
</script>

<style scoped>

</style>
