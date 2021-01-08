<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add New Product</h1>
                                </div>
                                <form class="user" @submit.prevent="productUpdate" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label>Product Name</label>
                                                <input type="text" v-model="form.product_name" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.product_name"> {{ errors.product_name[0] }} </small>
                                            </div>
                                            <div class="col-md-6">
                                                <label> Product Description</label>
                                                <textarea v-model="form.product_description" class="form-control" id="exampleInputFirstName"  required></textarea>
                                                <small class="text-danger" v-if="errors.product_description"> {{ errors.product_description[0] }} </small>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">

                                            <div class="col-md-6">
                                                <label> Product Code</label>
                                                <input type="text" v-model="form.product_code" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.product_code"> {{ errors.product_code[0] }} </small>
                                            </div>
                                            <div class="col-md-6">
                                                <label> Selling Price</label>
                                                <input type="text" v-model="form.selling_price" class="form-control" id="exampleInputFirstName"  required>
                                                <small class="text-danger" v-if="errors.selling_price"> {{ errors.selling_price[0] }} </small>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label> Root</label>
                                                <input type="text" v-model="form.root" class="form-control" id="exampleInputFirstName" required>
                                                <small class="text-danger" v-if="errors.root"> {{ errors.root[0] }} </small>

                                            </div>

                                            <div class="col-md-6">
                                                <label>Buying Price</label>
                                                <input type="text" v-model="form.buying_price" class="form-control" id="exampleInputFirstName" required>
                                                <small class="text-danger" v-if="errors.buying_price"> {{ errors.buying_price[0] }} </small>

                                            </div>

                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <label> Category</label>
                                                <select class="form-control mb-3" v-model="form.category_id">

                                                    <option :value="category.id" v-for="category in categories">{{category.name}}</option>
                                                </select>

                                            </div>

                                            <div class="col-md-4">
                                                <label> Supplier</label>
                                                <select class="form-control mb-3" v-model="form.supplier_id">
                                                    <option :value="supplier.id" v-for="supplier in suppliers">{{ supplier.sname }}</option>
                                                </select>

                                            </div>

                                            <div class="col-md-4">
                                                <label>Product Quantity</label>
                                                <input type="text" v-model="form.product_quantity" class="form-control" id="exampleInputFirstName" required>
                                                <small class="text-danger" v-if="errors.product_quantity"> {{ errors.product_quantity[0] }} </small>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected" required>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img :src="form.photo" width="50px;" height="50px;">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <button style="width:100px;" type="submit" class="btn btn-primary">Submit</button>

                                            <router-link to="/all-employee" class="btn btn-info text-center float-right ml-2">Products List</router-link>
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
        created(){
            if(!User.loggedIn()){
                this.$router.push('/')
            }else{
                let id = this.$route.params.id
                axios.get('/api/products/'+id)
                .then(({data})=>(this.form = data))
                .catch()

                axios.get('/api/category/')
                    .then(({data}) =>(this.categories = data))

                axios.get('/api/suppliers/')
                    .then(({data})=>(this.suppliers = data))
            }
        },
        data(){
            return{
                form:{
                    product_name:'',
                    product_description:'',
                    product_code:'',
                    selling_price:'',
                    root:'',
                    buying_price:'',
                    category_id:'',
                    supplier_id:'',
                    product_quantity:'',
                    photo:'',
                    newphoto:'',
                },
                errors:{},
                categories:{},
                suppliers:{}

            }
        },
        methods:{
            onFileSelected(event){
                let file = event.target.files[0];
                if(file.size > 1048770){
                    Notification.image_validation()
                }else{
                    let reader = new FileReader();
                    reader.onload = event =>{
                        this.form.newphoto = event.target.result

                    };
                    reader.readAsDataURL(file);
                }
            },
            productUpdate(){
                let id = this.$route.params.id
                axios.patch('/api/products/'+id,this.form)
                    .then(()=> {

                        this.$router.push('/all-product')
                        Notification.update()



                    })
                    .catch(error => this.errors = error.response.data.errors)
            }


        },



    }
</script>

<style scoped>

</style>
