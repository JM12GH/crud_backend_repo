import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/sidebar.css',
                'resources/js/sidebar.js',
                'resources/css/nav.css',
                'resources/js/nav.js',
               
                

            ],
            refresh: true,
        }),
    ],
});