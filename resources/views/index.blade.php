@extends('Layouts.app')
@section('title', 'Inicio')
@section('scripts')
@vite(['resources/js/load-file.js'])
@endsection
@section('content')
<!--Cuerpo de la pagina-->
<div class="flex justify-center h-full">
    <div class="ImagenLogo" style="padding:10%;">
        <img src="imgLogos/LogoASEISNEWSHORIZONTAL.png" alt="Logo ASEIS">

        <!--Nombre del usuario con sesion activa-->
        <div class="flex justify-end">
            <p class="text-2xl font-bold">Bienvenido, {{ Auth::user()->rol }}</p>
        </div>

    </div>
</div>
@endsection