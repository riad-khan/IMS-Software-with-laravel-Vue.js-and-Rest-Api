<template>
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-9 col-md-6">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">IMS Login</h1>
                                </div>
                                <form class="user" @submit.prevent="login">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address" v-model="form.email">
                                        <small class="text-danger" v-if="errors.email" >{{errors.email[0]}}</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="exampleInputPassword" v-model="form.password" placeholder="Password">
                                        <small class="text-danger" v-if="errors.password" >{{errors.password[0]}}</small>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <hr>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <router-link to="/register">Create An Account !</router-link> <br><br>
                                    <router-link to="/forgotPassword">Forgot Password ?</router-link>
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

<script >
    export default {
        created(){
            if(User.loggedIn()){
                this.$router.push('home')
            }
        },
        data(){
            return{
                form:{
                   email:null,
                   password: null
                },
                errors:{}

            }
        },
        methods:{
            login(){
                axios.post('/api/auth/login',this.form)
                .then(response => {
                    User.responseAfterLogin(response)
                    if(response){
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            text: 'Logged In SuccessFully ',
                            timeout: 2000,
                        }).show();

                        this.$router.push('/home')
                    }



                })
                .catch(error => this.errors = new Noty({
                    type: 'warning',
                    layout: 'topRight',
                    text: 'Invalid Email or Password ',
                    timeout: 2000,
                }).show(),)


            }
        }
    }
</script>

<style scoped>

</style>
