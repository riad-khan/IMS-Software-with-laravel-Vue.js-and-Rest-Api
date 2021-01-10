<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Years</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item">Salary</li>
                <li class="breadcrumb-item active" aria-current="page">Years</li>
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
                            <tr v-for="year in years" :key="year.year">
                                <td>{{ year.year }}</td>




                                <td>
                                    <router-link :to="{name:'Month_list',params:{id:year.year}}" class="btn btn-sm btn-primary">View</router-link>

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
                years:[],
                searchTerm:'',
            }
        },

        methods:{
            allYears(){
                axios.get('/api/salary/year')
                    .then(({data}) =>(this.years = data))
                    .catch()
            },


        },
        created(){
            this.allYears();
        }
    }
</script>

<style scoped>

</style>
