<template>
    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Order Status</h6>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" @submit.prevent="updateStatus">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Order Id</label>
                            <input type="text" v-model="form.id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Order Status</label>
                            <select class="form-control" v-model="form.order_status" id="exampleInputPassword1" required>

                                <option value="shipping">shipping</option>
                                <option value="processing">processing</option>
                                <option value="Delivered">Delivered</option>
                                <option value="cancelled">cancelled</option>


                            </select>
                        </div>


                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        created() {
            if(!User.loggedIn()){
                this.$router.push('/')
            }else{
                let id = this.$route.params.id
                axios.get('/api/order-status/'+id)
                .then(({data})=>(this.form = data))
                    .catch(error => this.errors = error.response.data.errors)
            }
        },
        data(){
            return{
                form:{
                    id:'',
                    order_status:'',
                },
                errors:{}
            }
        },
        methods:{
            updateStatus(){
               let id = this.$route.params.id
              axios.patch('/api/order-status-update/'+id,this.form)
                   .then(()=>{
                      this.$router.push('/orders')
                      Notification.update();
                  })
                 .catch()
           }
        }

    }
</script>

<style scoped>

</style>
