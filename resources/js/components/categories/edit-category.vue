<template>
    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" @submit.prevent="updateCategory">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" v-model="form.name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="Enter Category name">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Description</label>
                            <input type="text" class="form-control" v-model="form.description" id="exampleInputPassword1" placeholder="Category Description">
                        </div>


                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary">Update Category</button>
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
                axios.get('/api/category/'+id)
                .then(({data}) => (this.form = data))
                .catch(console.log(error))
            }
        },
        data(){
            return{
                form:{
                    name:'',
                    description:'',
                }
            }
        },
        methods:{
            updateCategory(){
                let id = this.$route.params.id
                axios.patch('/api/category/'+id,this.form)
                .then(()=>{
                    this.$router.push('/all-categories')
                    Notification.update();
                })
                .catch()
            }
        }

    }
</script>

<style scoped>

</style>
