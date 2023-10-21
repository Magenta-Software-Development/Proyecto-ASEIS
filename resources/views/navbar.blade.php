<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@section('title')
        Inicio
        @endsection</title>

    @section('css')
    <!-- Enlaza tu archivo CSS personalizado -->
    @vite('resources/css/informacion.css')
    @vite('resources/css/NavbarStyle.css')
    @endsection

</head>

<body>
    @extends('Layouts.app')
    @section('appBar')
    <div class="cuerpo">

        <!--Barra superior-->
        <div class="BarraSuperior">
            <a href="/"><img style="width: 133px; height: 63px" src="imgLogos/LogoASEISNEWSLETRAS.png" /></a>
        </div>

        <!--Cuerpo de la pagina-->
        <div class="contenido">
            @yield('content')
            
        </div>

        <!--Barra lateral-->
        <div style="padding-top: 55px; padding-bottom: 50px; padding-left: 40px; padding-right: 44px; left: 0px; top: 81px; position: absolute; background: white; flex-direction: column; justify-content: flex-end; align-items: flex-start; gap: 370px; display: inline-flex">
            <div style="align-self: stretch; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 21px; display: inline-flex">
                <a href="MostrarInfo">
                    <div style="width: 287px; padding: 20px; background: #1E6DA6; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: white">
                        Gestión de usuarios
                    </div>
                </a>
                <a href="#">
                    <div style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                        Gestión de categorías
                    </div>
                </a><a href="#">
                    <div style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                        Gestión de cursos
                    </div>
                </a><a href="#">
                    <div style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                        Cursos disponibles
                    </div>
                </a><a href="#">
                    <div style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                        Cursos publicados
                    </div>
                </a>

                </a><a href="#">
                    <div style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                        Cerrar sesión
                    </div>
                </a>

            </div>
        </div>
        @endsection
        @yield('scripts')

</body>

</html>