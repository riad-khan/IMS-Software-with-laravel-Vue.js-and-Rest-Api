<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Months</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item">Salary</li>
                <li class="breadcrumb-item active" aria-current="page">Years</li>
                <li class="breadcrumb-item active" aria-current="page">Months</li>
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

                                <th>Year</th>

                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="month in months" :key="month.month">
                                <td>{{ month.month }}</td>




                                <td>
                                    <router-link :to="{name:'Details',params:{id:month.month}}" class="btn btn-sm btn-primary">Details</router-link>

                                </td>
                            </tr>

                            </tbody>
                        </table>
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
            }
        },
        data(){
            return{
                months:[],
                searchTerm:'',
            }
        },

        methods:{
            allmonths(){
                let id = this.$route.params.id
                axios.get('/api/salary/month/'+id)
                    .then(({data}) =>(this.months = data))
                    .catch()



            },


        },
        created(){
            this.allmonths();
        }
    }
</script>

<style scoped>

</style>
