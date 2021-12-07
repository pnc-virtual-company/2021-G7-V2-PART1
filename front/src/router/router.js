

import {createRouter, createWebHistory} from 'vue-router';
import Register from '../components/register/Register.vue'
import Login from '../components/login/Login.vue';
import Home from '../view/Home.vue'

import Category from '../view/CategoryView.vue';
import MyEventView from '../view/MyEventView.vue';
import Joined from '../view/Joined.vue';
import About from '../view/About.vue';
import User from '../view/User.vue';
import Event from '../view/Event.vue';
import PersonalInfo from '../view/PersonalInfo.vue';

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
    {
        path: '/about',
        component: About
    },
    {
        path: '/personalInfo',
        component: PersonalInfo
    },
    {
        path: '/user',
        component: User
    },
    {
        path: '/event',
        component: Event
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes

});

export default router;