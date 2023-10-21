import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 'resources/js/app.js', 'resources/css/NavbarStyle.css',
                'resources/css/informacion.css', 'resources/js/load-file.js', 'resources/css/crearUsuarioAdminStyle.css',
                'resources/css/index-usuarios.css',
            ],
            refresh: true,
        }),
    ],
});
