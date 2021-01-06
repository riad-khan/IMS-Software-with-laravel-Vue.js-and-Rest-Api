
const login = require('./components/auth/login').default;
const  register = require('./components/auth/register').default;
const  forgotPassword = require('./components/auth/forgotPassword').default;
const  Home = require('./components/Home').default;
const logout = require('./components/auth/logout').default;
const NewEmployee = require('./components/employee/New-Employee').default;
const AllEmployee = require('./components/employee/All-employee').default;
const EditEmployee = require('./components/employee/edit-employee').default;
const AddSuppliers = require('./components/suppliers/add-suppliers').default;
const AllSuppliers = require('./components/suppliers/all-suppliers').default;
const EditSuppliers = require('./components/suppliers/edit-supplier').default;
const createCategory = require('./components/categories/create-categories').default;
const AllCategories = require('./components/categories/all-categories').default;
const EditCategory = require('./components/categories/edit-category').default;
export const routes = [
    { path: '/', component:login, name: '/' },
    { path: '/register', component: register, name: 'register'  },
    { path: '/forgotPassword', component: forgotPassword, name: 'forgotPassword'  },
    { path: '/Home', component: Home, name: 'Home'  },
    { path: '/logout', component: logout, name: 'logout'  },
    { path: '/new-employee', component: NewEmployee, name: 'NewEmployee'  },
    { path: '/all-employee', component: AllEmployee, name: 'AllEmployee'  },
    { path: '/edit-employee/:id', component: EditEmployee, name: 'EditEmployee'},
    { path: '/add-supplier', component: AddSuppliers, name: 'AddSuppliers'},
    { path: '/all-supplier', component: AllSuppliers, name: 'AllSuppliers'},
    { path: '/edit-supplier/:id', component: EditSuppliers, name: 'EditSuppliers'},
    { path: '/create-category', component: createCategory, name: 'createCategory'},
    { path: '/all-categories', component: AllCategories, name: 'AllCategories'},
    { path: '/edit-category/:id', component: EditCategory, name: 'EditCategory'},






]
