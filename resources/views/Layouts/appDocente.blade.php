<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASEISNEWS - @yield('title')</title>
    <!-- Inicio Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"> <!--Fontawesome-->
    <!-- Fin Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

    
    <!-- Enlaza tu archivo CSS personalizado -->

    @vite('resources/css/app.css')
    @yield('css')
    @yield('scripts')
    @vite('resources/js/navBarAdmin.js')
    @vite('resources/css/navBar.css')
</head>

<body>
    <!-- Parte superior -->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700" style="background-color: white">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <!-- Sidebar que se muestra cuando la pantalla es pequeña -->
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <div class="container-fluid">
                        <!-- agregamos el logo -->
                        <a class="navbar-brand" href="{{ route('app_index') }}">
                            <img src="{{ asset('imgLogos/LogoASEISNEWSLETRAS.png') }}" alt="" width="100" height="100" class="d-inline-block align-text-top">
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <!-- SideBar izquierdo -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar" style="background-color: white">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800" style="background-color: white">
            <ul class="space-y-2 font-medium" style="padding: 0px;">
                <li class="bd-links w-100">
                    <a href="{{ route('app_perfil_docente') }}">
                        <div class="custom-div" id="btnPerfil">
                            Perfil
                        </div>
                    </a>
                </li>
                <li class="bd-links w-100">
                    <a href="#">
                        <div class="custom-div" id="btnGestionCursos">
                            Gestión de cursos
                        </div>
                </li>
                <li class="bd-links w-100">
                    <a href="{{ route('app_index_cursos_publicados') }}">
                        <div class="custom-div" id="btnCursosPublicados">
                            Cursos publicados
                        </div>
                </li>
                <li class="bd-links w-100">
                    <a href="{{ route('app_index_cursos_no_disponibles') }}">
                        <div class="custom-div" id="btnCursosNoPublicados">
                            Cursos no disponibles
                        </div>
                    </a>
                </li>
                <li class="bd-links w-100">
                    <a href="#">
                        <div class="custom-div" id="btnGestionNoticias">
                            Gestion de noticias
                        </div>
                    </a>
                </li>
                <li class="bd-links w-100">
                    <a href="#">
                        <div class="custom-div" id="btnNoticiasPublicadas">
                            Noticias publicadas
                        </div>
                    </a>
                </li>
                <li class="bd-links w-100">
                <form method="POST" action="{{ route('app_logout') }}">
                        @csrf
                        <button type="submit" class="custom-div">Cerrar Sesion</button>
                    </form>
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