<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Update Stock</h1>
                                </div>
                                <form class="user" @submit.prevent="updateStock" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label>Product Name</label>
                                                <input type="text" v-model="form.product_name" class="form-control" id="exampleInputFirstName" readonly>

                                            </div>
                                            <div class="col-md-6">
                                                <label>Stock Quantity</label>
                                                <input type="text" v-model="form.product_quantity" class="form-control" id="exampleInputFirstName" required>

                                            </div>


                                        </div>

                                    </div>






                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <button style="width:120px;" type="submit" class="btn btn-primary">update Stock</button>


                                        </div>

                                    </div>

                                    <hr>

                                </form>
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
            if(!User.loggedIn()){
                this.$router.push('/')
            }else{
                let id = this.$route.params.id
                axios.get('/api/stock/'+id)
                .then(({data})=>(this.form = data))
                    .catch(error => {
                        console.log(error.response.data.error)
                    })
            }
        },
        data(){
            return{
                form:{
                    product_name:'',
                    product_quantity:'',
                }
            }
        },
        methods:{
            updateStock(){
                let id = this.$route.params.id
                axios.patch('/api/stock/'+id,this.form)
                .then(()=>{
                    Notification.update()
                    this.$router.push('/product-stock')
                })
                    .catch(error => {
                        console.log(error.response.data.error)
                    })
            }
        }

    }
</script>

<style scoped>

</style>
