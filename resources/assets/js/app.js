
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

// Product
import showListProduct from './components/product/showListProduct.vue';
import editProduct from './components/product/editProduct.vue';
import addProduct from './components/product/addProduct.vue';
// Category
import showListCategory from './components/category/showListCategory.vue';
import addCategory from './components/category/addCategory.vue';
import editCategory from './components/category/editCategory.vue';
// User
import showListUser from './components/user/showListUser.vue';
import addUser from './components/user/addUser.vue';
import editUser from './components/user/editUser.vue';
// Order
import showListOrder from './components/order/showListOrder.vue';
import editOrder from './components/order/editOrder.vue';

const routes = [
    {
        path: '/',
        components: {
            showListProduct: ''
        }
    },
    // {path: '/admin/create', component: CompaniesCreate, name: 'createCompany'},
    {path: '/product/edit/:id', component: editProduct, name: 'editProduct'},
    {path: '/product/addProduct', component: addProduct, name: 'addProduct'},
    {path: '/product/showListProduct', component: showListProduct, name: 'showListProduct'},
    {path: '/category/showListCategory', component: showListCategory, name: 'showListCategory'},
    {path: '/category/addCategory', component: addCategory, name: 'addCategory'},
    {path: '/category/edit/:id', component: editCategory, name: 'editCategory'},
    {path: '/user/showListUser', component: showListUser, name: 'showListUser'},
    {path: '/user/addUser', component: addUser, name: 'addUser'},
    {path: '/user/editUser/:id', component: editUser, name: 'editUser'},
    {path: '/order/showListOrder', component: showListOrder, name: 'showListOrder'},
    {path: '/order/editOrder/:id', component: editOrder, name: 'editOrder'}

]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#wrapper')