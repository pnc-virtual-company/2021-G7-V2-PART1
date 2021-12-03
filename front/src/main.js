import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import {createRouter, createWebHistory} from 'vue-router';
import Register from './components/register/Register.vue'
import Login from './components/login/Login.vue';
import Home from './components/home/Home.vue'

import Category from './components/category/CategoryView.vue';
const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: '/',component: Login},
        {path: '/register',component: Register},
        {path: '/home',component: Home},
        {path: '/category',component: Category},
    ]

})
const app = createApp(App);
app.use(router);
app.mount('#app');