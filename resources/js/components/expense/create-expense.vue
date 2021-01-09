<template>
    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Create Expense</h6>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" @submit.prevent="createCategory">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Expense Amount</label>
                            <input type="text" v-model="form.amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="Enter Expense Amount">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Expense Description</label>
                            <input type="text" class="form-control" v-model="form.expense_description" id="exampleInputPassword1" placeholder="Expense Description">
                        </div>


                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary">create Expense</button>
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
            }
        },
        data(){
            return{
                form:{
                    amount:null,
                    expense_description:null,
                }
            }
        },
        methods:{
            createCategory(){
                axios.post('/api/expense',this.form)
                    .then(()=>{
                        this.$router.push('/all-expense')
                        Notification.success()
                    })
                    .catch()
            }
        }
    }
</script>

<style scoped>

</style>
