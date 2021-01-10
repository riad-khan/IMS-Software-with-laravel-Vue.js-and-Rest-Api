
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
const AddProduct = require('./components/products/add-products').default;
const AllProduct = require('./components/products/all-products').default;
const EditProduct = require('./components/products/edit-products').default;
const AllExpense = require('./components/expense/all-expense').default;
const CreateExpense = require('./components/expense/create-expense').default;
const EditExpense = require('./components/expense/edit-expense').default;
const Salary_list = require('./components/salary/all-emploies').default;
const pay_salary = require('./components/salary/pay-salary').default;
const Viewsalary = require('./components/salary/view-sallery').default;
const Month_list = require('./components/salary/month-list').default;
const Details = require('./components/salary/salary-list').default;

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
    { path: '/add-product', component: AddProduct, name: 'AddProduct'},
    { path: '/all-product', component: AllProduct, name: 'AllProduct'},
    { path: '/edit-product/:id', component: EditProduct, name: 'EditProduct'},
    { path: '/all-expense', component: AllExpense, name: 'AllExpense'},
    { path: '/create-expense', component: CreateExpense, name: 'CreateExpense'},
    { path: '/edit-expense/:id', component: EditExpense, name: 'EditExpense'},
    { path: '/given-salary', component: Salary_list, name: 'Salary_list'},
    { path: '/pay-salary/:id', component: pay_salary, name: 'pay_salary'},
    { path: '/view-salary', component: Viewsalary, name: 'Viewsalary'},
    { path: '/month-list/:id', component: Month_list, name: 'Month_list'},
    { path: '/salary-details/:id', component: Details, name: 'Details'},












]
