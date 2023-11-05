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
                "resources/css/gestionCrearCursos.css",
                "resources/css/infoCursosModal.css",
    
                //Js
                "resources/js/app.js",
                "resources/js/load-file.js",
                "resources/js/login.js",
                "resources/js/crearUsuariosAdmin.js",
                "resources/js/desactivarUsuario.js",
                "resources/js/registro-docente.js",
                "resources/js/modulo-gestion-categorias/categorias-admin.js",
                "resources/js/modulo-gestion-usuarios/docentes-admin.js",
                "resources/js/modulo-gestion-usuarios/estudiantes-admin.js",
                "resources/js/modulo-gestion-codigos/codigos-admin.js",
                "resources/js/modulo-gestion-especialidades/especialidades-admin.js",
                "resources/js/limitePalabras.js"

            ],
            refresh: true,
        }),
    ],
});
