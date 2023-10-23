import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/NavbarStyle.css",
                "resources/css/informacion.css",
                "resources/js/load-file.js",
                "resources/js/login.js",
                "resources/css/crearUsuarioAdminStyle.css",
                "resources/css/index-usuarios.css",
                "resources/css/styleUsuariosAdmin.css",
                "resources/css/desactivarUsuario.css",
            ],
            refresh: true,
        }),
    ],
});
