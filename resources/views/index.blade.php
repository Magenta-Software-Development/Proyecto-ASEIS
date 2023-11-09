@extends('Layouts.app')

@section('title', 'Inicio')

@section('scripts')
@vite(['resources/js/indexTime.js'])
@endsection

@section('content')

<!--Cuerpo de la pagina-->
<div class="flex justify-center h-full">
    <div class="ImagenLogo" style="padding:10%;">
        <img src="imgLogos/LogoASEISNEWSHORIZONTAL.png" alt="Logo ASEIS">
        <div class="flex flex-col justify-center h-full">
            <!--Nombre del usuario con sesion activa-->
            <div class="flex justify-center">
                <p class="text-2xl font-bold">Bienvenido Administrador</p>
            </div>
            <div class="flex justify-center">
                <!--Fecha actual -->
                <p class="text-2xl font-bold" id="date"></p>
            </div>
        </div>
    </div>
</div>

@endsection