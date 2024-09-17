import { createRouter, createWebHistory } from "vue-router";

import mainStore from "@/store/index.js";

import Api from "@/services/api";
import Login from "@/views/Login.vue";
import Home from "@/views/Home.vue";
import Dashboard from "@/views/admin/dashboard/Dashboard.vue";


// import Booking from "@/views/booking/Index.vue";

import NotFound from "@/views/errors/404.vue";
import ForbiddenAccess from "@/views/errors/403.vue";
import globalConfig from "@/config/config";

const routesWithPrefix = (prefix, routes) => {
    return routes.map((route) => {
        route.path = `${prefix}${route.path}`;

        return route;
    });
};

const routes = [
    {
        path: "/login",
        name: "login",
        component: Login,
        meta: {
            title: "Login",
        },
    },
    
    {
        path: "/home",
        component: Home,
        name: "home",
        meta: {
            title: "Home",
            auth: true,
        },
    },
    ...routesWithPrefix("/admin", [
        {
            path: "/dashboard",
            name: "dashboard",
            component: Dashboard,
            meta: {
                title: "Dashboard",
                specificRole: [globalConfig.role.admin, globalConfig.role.super_admin, globalConfig.role.developer],
                auth: true,
            },
        },
    ]),
    

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
    history: createWebHistory(SUBFOLDER_DOMAIN),
    routes,
    scrollBehavior(to, from, savedPosition) {
        return {
            top: 0,
        };
    },
});

router.beforeEach(async (to, from, next) => {
    
    try {
        if (to.matched.some((record) => record.meta.title)) {
            if (to.meta && to.meta.title) {
                document.title = to.meta.title;
            }
        }
    
        if (to.matched.some((record) => record.meta.auth)) {
            if (!localStorage.getItem("access_token")) {
                const urlParams = new URLSearchParams(window.location.search);
                const myParam = urlParams.get("code");
                if (myParam) {
                    return next({ name: "login", query: { code: myParam } });
                }
                return next();
            } else {
                if (mainStore.state.profile.isLoggedIn) {
                    if (to.matched.some((record) => record.meta.specificRole)) {
                        if (
                            to.meta &&
                            to.meta.specificRole &&
                            to.meta.specificRole.length > 0
                        ) {
                            const hasAccess = to.meta.specificRole.filter(
                                (e) => e == mainStore.state.profile.roleId
                            );
                            if (hasAccess.length == 0) {
                                return next("/403");
                            }
                        }
                    }
    
                    return next();
                }
                try {
                    const response = await Api().get("api/auth/me");
                    mainStore.commit(
                        "profile/SET_PROFILE_DATA",
                        response.data.data
                    );
                    if (to.matched.some((record) => record.meta.specificRole)) {
                        if (
                            to.meta &&
                            to.meta.specificRole &&
                            to.meta.specificRole.length > 0
                        ) {
                            const hasAccess = to.meta.specificRole.filter(
                                (e) => e == response.data.data.role.slug
                            );
                            if (hasAccess.length == 0) {
                                return next("/403");
                            }
                        }
                    }
                    const urlParams = new URLSearchParams(
                        window.location.search
                    );
                    const myParam = urlParams.get("code");
                    if (myParam) {
                        return next({ name: "Home", query: { code: myParam } });
                    } else {
                        return next();
                    }
                } catch (error) {
                    localStorage.clear();
                    mainStore.commit("profile/SET_PROFILE_DATA", null);
                    console.error(error);
                    return next("/login");
                }
            }
        } else if (to.matched.some((record) => record.meta.guest)) {
            if (!localStorage.getItem("access_token")) {
                return next();
            } else {
                const urlParams = new URLSearchParams(window.location.search);
                const myParam = urlParams.get("code");
                if (myParam) {
                    return next({ name: "Home", query: { code: myParam } });
                } else {
                    return next("/dashboard");
                }
            }
        } else {
            return next();
        }
    } catch (error) {
        console.error("Error during route navigation:", e);
        localStorage.clear();
        mainStore.commit("profile/SET_PROFILE_DATA", null);
        return next("/login");
    }
    
});

export default router;
