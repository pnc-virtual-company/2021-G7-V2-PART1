import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import {createRouter, createWebHistory} from 'vue-router';
import Register from './components/register/Register.vue'
import Login from './components/login/Login.vue';
import Home from './components/home/Home.vue'

import Category from './components/category/CategoryView.vue';
import myEvent from './components/myEvent/MyEvent.vue';
import Joined from './components/joined/Joined.vue';

import About from './components/about/About.vue';
import User from './components/user/User.vue';
import Event from './components/event/Event.vue';
import PersonalInfo from './components/personalInfo/PersonalInfo.vue';

//----Import Card-------
import CategoryCardView from './components/category/CategoryView.vue';


const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: '/',component: Login},
        {path: '/register',component: Register},
        {path: '/home',component: Home},
        {path: '/category',component: Category},
        {path: '/my_event',component: myEvent},
        {path: '/join',component: Joined},
        {path: '/about',component: About},
        {path: '/personalInfo',component: PersonalInfo},
        {path: '/user',component: User},
        {path: '/event',component: Event},
        //----Part CategoryCard View-------
        {path: '/categoryCard', component: CategoryCardView}
       
    ]

})
const app = createApp(App);
app.use(router);
app.mount('#app');