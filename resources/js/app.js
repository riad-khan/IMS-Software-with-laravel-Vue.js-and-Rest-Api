/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'



Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/** router part starts here */

import {routes} from './routes'


//import User helper class globally
//****


import User from './Helpers/User'
window.User = User

window.Reload = new Vue();

//notification Helper Import//

import Notification from './Helpers/Notification'
window.Notification = Notification

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    router
});

const date = new Vue({
    el:'#date',
})
