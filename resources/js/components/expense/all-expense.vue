<template>
    <div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #6777ef;">Expense List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item">Expense</li>
                <li class="breadcrumb-item active" aria-current="page">All Expense</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">

                    <div class="card-header py-3 flex-row justify-content-between">

                        <input type="text" class="form-control float-right " v-model="searchTerm" style="width: 350px" placeholder="Search Expense By Date"><br>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Amount</th>
                                <th>Expense Description</th>
                                <th>Expense Date</th>


                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="expense in expenseSearch" :key="expense.id">
                                <td>{{ expense.amount }}</td>
                                <td>{{ expense.expense_description }}</td>
                                <td>{{ expense.expense_date }}</td>


                                <td>
                                    <router-link :to="{name:'EditExpense',params:{id:expense.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                  <a @click="deleteExpense(expense.id)" style="color: white" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                        <div class="row justify-content-center">
                            <router-link to="/create-expense" class="btn btn-primary text-center">Add New Expense</router-link>
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
                expenses:[],
                searchTerm:'',
            }
        },
        computed:{
            expenseSearch(){
                return this.expenses.filter(expense =>{
                    return expense.expense_date.match(this.searchTerm)
                })
            }
            },
        methods:{

            allExpense(){
                axios.get('/api/expense/')
                    .then(({data}) =>(this.expenses = data))
                    .catch()
            },
            deleteExpense(id){
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
                        axios.delete('/api/expense/'+id)
                            .then(() => {
                                this.expenses = this.expenses.filter(expense => {
                                    return expense.id != id
                                    this.$router.push({name: '/all-expense'})
                                })
                            })
                            .catch()
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            }

        },
        created(){
            this.allExpense();
        }
    }
</script>

<style scoped>

</style>
