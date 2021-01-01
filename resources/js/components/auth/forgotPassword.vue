<template>
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Forgot Password ?</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address">
                                    </div>


                                    <div class="form-group">
                                        <a href="index.html" class="btn btn-primary btn-block">Login</a>
                                    </div>
                                    <hr>

                                </form>
                                <hr>
                                <div class="text-center">

                                    <router-link to="/">Back To Login</router-link>
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

<script>
    export default {
        name: "forgotPassword.vue"
    }
</script>

<style scoped>

</style>
