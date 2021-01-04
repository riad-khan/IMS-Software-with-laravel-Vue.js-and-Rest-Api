
const login = require('./components/auth/login').default;
const  register = require('./components/auth/register').default;
const  forgotPassword = require('./components/auth/forgotPassword').default;
const  Home = require('./components/Home').default;
const logout = require('./components/auth/logout').default;
const NewEmployee = require('./components/employee/New-Employee').default;
const AllEmployee = require('./components/employee/All-employee').default;
const EditEmployee = require('./components/employee/edit-employee').default;


export const routes = [
    { path: '/', component:login, name: '/' },
    { path: '/register', component: register, name: 'register'  },
    { path: '/forgotPassword', component: forgotPassword, name: 'forgotPassword'  },
    { path: '/Home', component: Home, name: 'Home'  },
    { path: '/logout', component: logout, name: 'logout'  },
    { path: '/new-employee', component: NewEmployee, name: 'NewEmployee'  },
    { path: '/all-employee', component: AllEmployee, name: 'AllEmployee'  },
    { path: '/edit-employee/:id', component: EditEmployee, name: 'EditEmployee'},





]
