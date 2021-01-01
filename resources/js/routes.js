
const login = require('./components/auth/login.vue').default;
const  register = require('./components/auth/register.vue').default;
const  forgotPassword = require('./components/auth/forgotPassword.vue').default;
const  Home = require('./components/Home.vue').default;
const logout = require('./components/auth/logout.vue').default;


export const routes = [
    { path: '/', component:login, name: '/' },
    { path: '/register', component: register, name: 'register'  },
    { path: '/forgotPassword', component: forgotPassword, name: 'forgotPassword'  },
    { path: '/Home', component: Home, name: 'Home'  },
    { path: '/logout', component: logout, name: 'logout'  }


]
