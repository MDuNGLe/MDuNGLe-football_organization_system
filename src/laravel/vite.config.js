import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    build: {minify:false,terserOptions:{compress:false,mangle:false}},
    plugins: [
        laravel({
            input: [
                // 'resources/css/app.css',
                // 'resources/js/app.js',
                 'resources/js/fullcalendar.js',
                 'resources/js/live-search.js',
                 'resources/js/players.js',
                ]
            ,
            refresh: true,
        }),
        tailwindcss(),
    ],
});
