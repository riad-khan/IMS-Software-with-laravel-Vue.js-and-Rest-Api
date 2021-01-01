<template>
    <div>
       <h2>Log</h2>
    </div>
</template>

<script>
    export default {
        created() {
            localStorage.removeItem('token')
            localStorage.removeItem('user')
            new Noty({
                type: 'success',
                layout: 'topRight',
                text: 'Log Out SuccessFull',
                timeout: 2000,
            }).show();

            this.$router.push('/')
        }
    }
</script>

<style scoped>

</style>
