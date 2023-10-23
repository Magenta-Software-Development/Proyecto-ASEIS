<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASEISNEW - @yield('title')</title>
    <!-- Inicio Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Fin Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Enlaza tu archivo CSS personalizado -->

    @vite('resources/css/app.css')
    @yield('css')
    @yield('scripts')
</head>

<body>
    <!-- Parte superior -->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700" style="background-color: white">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <!-- Sidebar que se muestra cuando la pantalla es pequeña -->
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <div class="container-fluid">
                        <!-- agregamos el logo -->
                        <a class="navbar-brand" href="{{ route('app_index') }}">
                            <img src="{{ asset('imgLogos/LogoASEISNEWSLETRAS.png') }}" alt="" width="100"
                                height="100" class="d-inline-block align-text-top">
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <!-- SideBar izquierdo -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar" style="background-color: white">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800" style="background-color: white">
            <ul class="space-y-2 font-medium">
                <li class="bd-links w-100">
                    <a href="{{ route('app_index_usuarios') }}">
                        <div
                            style="width: 200px; padding: 20px; background: #1E6DA6; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: white">
                            Gestión de usuarios
                        </div>
                    </a>
                </li>
                <li class="bd-links w-100">
                    <a href="#">
                        <div
                            style="width: 200px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                            Gestión de categorías
                        </div>
                </li>
                <li class="bd-links w-100">
                    <a href="#">
                        <div
                            style="width: 200px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                            Gestión de cursos
                        </div>
                </li>
                <li class="bd-links w-100">
                    <a href="#">
                        <div
                            style="width: 200px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                            Cursos disponibles
                        </div>
                </li>
                <li class="bd-links w-100">
                    <a href="#">
                        <div
                            style="width: 200px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                            Cursos publicados
                        </div>
                    </a>
                </li>
                <li class="bd-links w-100">
                    <a href="#">
                        <div
                            style="width: 200px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                            Cerrar sesión
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
<br><br>
    <!-- Contenido principal -->
    <div class="sm:ml-64">
        @yield('content')
    </div>

</body>

</html>
