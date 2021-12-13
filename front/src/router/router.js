

import {createRouter, createWebHistory} from 'vue-router';
import Register from '../components/register/Register.vue'
import Login from '../components/login/Login.vue';
import Home from '../view/Home.vue'

import Category from '../view/CategoryView.vue';
import MyEventView from '../view/MyEventView.vue';
import Joined from '../view/Joined.vue';



const routes = [
    {
        path: '/',
        component: Login
    },
    {
        path: '/register',
        component: Register
    },
    {
        path: '/home',
        component: Home
    },
    {
        path: '/category',
        component: Category
    },
    {
        path: '/my_event',
        component: MyEventView
    },
    {
        path: '/join',
        component: Joined
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes

});

export default router;