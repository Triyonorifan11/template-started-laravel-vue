import env from "../functions/env";
/**
 * Pastikan key env memiliki prefix VITE_ untuk support vite.js
 */
const globalConfig = {
    app_url: env('VITE_APP_URL'),
    role:{
        admin: env('VITE_ROLE_ADMIN', 'admin'),
        super_admin: env('VITE_ROLE_SUPER_ADMIN', 'super-admin'),
        customer: env('VITE_ROLE_CONSUMER', 'customer'),
        developer: env('VITE_ROLE_DEVELOPER', 'developer'),
        reviewer: env('VITE_ROLE_REVIEWER', 'reviewer'),
    },
    captcha_apikey: env('VITE_RECAPTCHA_APIKEY','6LfaPXcjAAAAAAcR3ruk932V0bWuRhpEVw9JYT9g'),
}

export default globalConfig;