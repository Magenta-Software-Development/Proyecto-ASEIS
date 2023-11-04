
@if(Auth::user()->rol == 'Admin')
@extends('Layouts.app')
@section('title', 'Gestion de admin')
@endif

@section('scripts')
@vite('resources/js/modulo-gestion-noticias/noticias-admin.js');
@endsection

@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/styleCursos.css')
@vite('resources/css/informacion.css')
@endsection

@section('content')

<div class="contenedorPrincipal">

    <!-- area de busqueda -->
   <div class="contenedorBusqueda">
    <div class="InputBuscar">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Buscar..." />
    </div>
   </div>

   <!-- contenedor de cursos-->
      <!-- contenedor de cursos-->
    <div id="container-noticias">

    </div>

</div>

@endsection