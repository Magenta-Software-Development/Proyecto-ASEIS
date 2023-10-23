<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASEISNEW - @yield('title')</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @vite('resources/css/NavbarStyle.css')
    @yield('css')
</head>

<body>

    <div class="parent">
        <!-- As a heading -->
        <div class="div1">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <!-- Agregamos el botón de hamburguesa para abrir la barra lateral (visible en pantallas pequeñas) -->
                    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdSidebar" aria-controls="bdSidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Agregamos el logo -->
                    <a class="navbar-brand" href="{{ route('app_index') }}">
                        <img src="{{ asset('imgLogos/LogoASEISNEWSLETRAS.png') }}" alt="" width="100"
                            height="100" class="d-inline-block align-text-top">
                    </a>
                </div>
            </nav>
        </div>
        <div class="div2">
            <!-- Agregamos el navbar lateral -->
            <aside class="bd-sidebar">
                <div class="offcanvas-lg offcanvas-start" data-bs-backdrop="false" tabindex="-1" id="bdSidebar"
                    aria-labelledby="bdSidebarOffcanvasLabel">
                    <nav class="bd-links w-100">
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        <ul class="bd-links-nav list-unstyled mb-0 pb-3 pb-md-2 pe-lg-2">
                            <li class="bd-links w-100">
                                <a href="{{ route('app_index_usuarios') }}">
                                    <div
                                        style="width: 287px; padding: 20px; background: #1E6DA6; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: white">
                                        Gestión de usuarios
                                    </div>
                                </a>
                            </li>
                            <li class="bd-links w-100">
                                <a href="#">
                                    <div
                                        style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items; gap: 10px; display: inline-flex; color: #1E6DA6">
                                        Gestión de cursos
                                    </div>
                            </li>
                            <li class="bd-links w-100">
                                <a href="#">
                                    <div
                                        style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                                        Cursos disponibles
                                    </div>
                                </a>
                            </li>
                            <li class="bd-links w-100">
                                <a href="#">
                                    <div
                                        style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                                        Cursos publicados
                                    </div>
                                </a>
                            </li>
                            <li class="bd-links w-100">
                                <a href="#">
                                    <div
                                        style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                                        Cerrar sesión
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <aside class="bd-sidebar">
                <div class="offcanvas-lg offcanvas-start" data-bs-backdrop="false" tabindex="-1" id="bdSidebar"
                    aria-labelledby="bdSidebarOffcanvasLabel">
                    <nav class="bd-links w-100">
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        <ul class="bd-links-nav list-unstyled mb-0 pb-3 pb-md-2 pe-lg-2">
                            <li class="bd-links w-100">
                                <a href="{{ route('app_index_usuarios') }}">
                                    <div
                                        style="width: 287px; padding: 20px; background: #1E6DA6; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: white">
                                        Gestión de usuarios
                                    </div>
                                </a>
                            </li>
                            <li class="bd-links w-100">
                                <a href="#">
                                    <div
                                        style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items; gap: 10px; display: inline-flex; color: #1E6DA6">
                                        Gestión de cursos
                                    </div>
                            </li>
                            <li class="bd-links w-100">
                                <a href="#">
                                    <div
                                        style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                                        Cursos disponibles
                                    </div>
                                </a>
                            </li>
                            <li class="bd-links w-100">
                                <a href="#">
                                    <div
                                        style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                                        Cursos publicados
                                    </div>
                                </a>
                            </li>
                            <li class="bd-links w-100">
                                <a href="#">
                                    <div
                                        style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                                        Cerrar sesión
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
        </div>
        <div class="div3">
            @yield('content')
        </div>
    </div>

</body>

</html>
