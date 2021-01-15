<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Category List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active" aria-current="page">All Category</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">



                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>


                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="category in categories" :key="category.id">
                                <td>{{ category.name }}</td>
                                <td>{{ category.description }}</td>


                                <td>
                               <router-link :to="{name:'EditCategory',params:{id:category.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                    <a @click="deleteCategory(category.id)" style="color: white" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                        <div class="row justify-content-center">
                            <router-link to="/create-category" class="btn btn-primary text-center">Add New Category</router-link>
                        </div>

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
            }
        },
        data(){
            return{
                categories:[],

            }
        },

        methods:{
            allcategories(){
                axios.get('/api/category/')
                    .then(({data}) =>(this.categories = data))
                    .catch()
            },
            deleteCategory(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/category/'+id)
                            .then(() => {
                                this.categories = this.categories.filter(category => {
                                    return category.id != id
                                    this.$router.push({name: '/all-employee'})
                                })
                            })
                            .catch()
                        Swal.fire(
                            'Deleted!',
                            'Your Category has been deleted.',
                            'success'
                        )
                    }
                })
            }


        },
        created(){
            this.allcategories();
        }
    }
</script>

<style scoped>

</style>
