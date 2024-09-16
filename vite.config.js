import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app-admin.css', 'resources/js/app-admin.js',
                'resources/css/app-landing.css', 'resources/js/app-landing.js'
            ],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, 'resources/js'),
            vue: 'vue/dist/vue.esm-bundler.js'
        },
    },
});
