<template>

    <div>





        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> Order Details </h1>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <!-- Simple Tables -->
                                            <div class="card">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Order Details </h6>
                                                </div>
                                                <div class="table-responsive">

                                                    <ul class="list-group">
                                                        <li class="list-group-item"><b>Name :  </b> &nbsp; {{ orders.customer_name }}  </li>
                                                        <li class="list-group-item"><b>Phone :</b> &nbsp; {{ orders.phone_number }} </li>
                                                        <li class="list-group-item"><b>Address :</b> &nbsp; {{ orders.address }} </li>
                                                        <li class="list-group-item"><b>Date :</b>  &nbsp; {{ orders.order_date }} </li>
                                                        <li class="list-group-item"><b>Pay Through :</b>  &nbsp; {{ orders.pay_by }}</li>
                                                    </ul>


                                                </div>
                                                <div class="card-footer"></div>
                                            </div>
                                        </div>




                                        <div class="col-lg-6 mb-4">
                                            <!-- Simple Tables -->
                                            <div class="card">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                                                </div>
                                                <div class="table-responsive">


                                                    <ul class="list-group">
                                                        <li class="list-group-item"><b>Sub Total :</b>   &nbsp; {{ orders.sub_total }} Tk </li>
                                                        <li class="list-group-item"><b>Vat :</b>  &nbsp; {{ orders.vat }} %</li>
                                                        <li class="list-group-item"><b>Total :</b>   &nbsp; {{ orders.total }} Tk</li>
                                                        <li class="list-group-item"><b>Pay Amount :</b>   &nbsp; {{ orders.pay }} Tk</li>
                                                        <li class="list-group-item"><b>Due Amount :</b>   &nbsp; {{ orders.due }} Tk</li>
                                                    </ul>



                                                </div>
                                                <div class="card-footer"></div>
                                            </div>
                                        </div>


















                                    </div>





                                    <div class="row">
                                        <div class="col-lg-12 mb-4">
                                            <!-- Simple Tables -->
                                            <div class="card">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table align-items-center table-flush">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Image</th>
                                                            <th>Qty</th>
                                                            <th>Unit Price </th>
                                                            <th>Total </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr v-for="detail in details">
                                                            <td>{{ detail.product_name }}</td>
                                                            <td>{{ detail.product_code }}</td>
                                                            <td><img :src="'/'+detail.product_image" id="em_photo"></td>
                                                            <td>{{ detail.product_qty }}</td>
                                                            <td>{{ detail.product_price }} TK</td>
                                                            <td>{{ detail.subtotal }} Tk</td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer"></div>
                                            </div>
                                        </div>
                                    </div>








                                    <hr>
                                    <div class="text-center">


                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>



<script type="text/javascript">

    export default {

        created() {
            let id = this.$route.params.id
            axios.get('/api/order-details/'+id)
                .then(({data}) => (this.orders = data))
                .catch(console.log('error'))

            axios.get('/api/order-detailsAll/'+id)
                .then(({data}) => (this.details = data))
                .catch(console.log('error'))
        },
        data(){
            return {
                orders:{},
                details:{},
                errors:{},

            }
        },


        methods:{


        }


    }

</script>


<style type="text/css" scoped>
    #em_photo{
        height: 40px;
        width: 40px;
    }
</style>
