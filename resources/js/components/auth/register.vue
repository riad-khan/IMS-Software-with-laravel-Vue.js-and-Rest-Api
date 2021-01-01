<template>
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>
                                <form class="user" @submit.prevent="register">
                                    <div class="form-group">
                                        <label> Name</label>
                                        <input type="text" v-model="form.name" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" v-model="form.email" id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" v-model="form.password" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input type="password" class="form-control" v-model="form.password_confirmation" id="exampleInputPasswordRepeat"
                                               placeholder="Repeat Password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                    <hr>

                                </form>
                                <hr>
                                <div class="text-center">

                                    <router-link to="/">Already have an account?</router-link>
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
</template>

<script type="text/javascript">
    export default {
        created(){
            if(User.loggedIn()){
                this.$router.push('home')
            }
        },
        data(){
            return{
                form:{
                    name: null,
                    email:null,
                    password: null,
                    confirm_password:null
                },
                errors:{}

            }
        },
        methods:{
            register(){
                axios.post('/api/auth/register',this.form)
                    .then(response => {
                        User.responseAfterLogin(response)

                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: 'Signed Up SuccessFully ',
                                timeout: 2000,
                            }).show();

                            this.$router.push('/home')



                    })
                    .catch(error => this.errors = error.response.data.errors)


            }
        }
    }
</script>

<style scoped>

</style>
