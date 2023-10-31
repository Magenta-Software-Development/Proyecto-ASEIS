import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [

                //Css
                "resources/css/app.css",
                "resources/css/NavbarStyle.css",
                "resources/css/informacion.css",
                "resources/css/crearUsuarioAdminStyle.css",
                "resources/css/index-usuarios.css",
                "resources/css/styleUsuariosAdmin.css",
                "resources/css/desactivarUsuario.css",
                "resources/css/perfilDocente.css",
    
                //Js
                "resources/js/app.js",
                "resources/js/load-file.js",
                "resources/js/login.js",
                "resources/js/crearUsuariosAdmin.js",
                "resources/js/desactivarUsuario.js",
                "resources/js/registro-docente.js",
                "resources/js/editPerfDoc.js",
            ],
            refresh: true,
        }),
    ],
});
