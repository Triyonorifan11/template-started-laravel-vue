import { createRouter, createWebHistory } from "vue-router";

import mainStore from "@/store/index.js";

import Api from "@/services/api";

import Home from "@/views/landing/index.vue";
import About from "@/views/landing/about/index.vue";
import Login from "@/views/admin/Login.vue";

// import Booking from "@/views/booking/Index.vue";

import NotFound from "@/views/errors/404.vue";
import ForbiddenAccess from "@/views/errors/403.vue";

const routes = [
    
    
    {
        path: "/",
        component: Home,
        name: "Home",
        meta: {
            title: "Home",
            auth: true,
        },
    },
    {
        path: "/about",
        component: About,
        name: "About",
        meta: {
            title: "About",
            auth: true,
        },
    },
    {
        path: "/login",
        name: "login",
        component: Login,
        meta: {
            guest: true,
            title: "Login",
        },
    },
    // {
    //     path: "/booking",
    //     name: "booking",
    //     component: Booking,
    //     meta: {
    //         title: "Booking",
    //         specificRole: [
    //             import.meta.env.VITE_ROLE_ADMIN,
    //             import.meta.env.VITE_ROLE_SUPER_ADMIN,
    //             import.meta.env.VITE_ROLE_REVIEWER,
    //         ],
    //         auth: true,
    //     },
    // },
    

    {
        path: "/403",
        component: ForbiddenAccess,
        meta: {
            title: "403",
            auth: true,
        },
    },
    {
        path: "/:pathMatch(.*)*",
        redirect: "/404",
        title: "403",
    },
    {
        path: "/404",
        component: NotFound,
        meta: {
            title: "404",
            auth: true,
        },
    },
];


const router = createRouter({
    history: createWebHistory(import.meta.env.VITE_SUBPATH_DOMAIN),
    routes,
    scrollBehavior(to, from, savedPosition) {
        return {
            top: 0
        }
    }
});

export default router