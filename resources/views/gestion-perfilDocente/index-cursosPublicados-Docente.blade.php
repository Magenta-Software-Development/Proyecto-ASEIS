@extends('Layouts.appDocente')
@section('title', 'Gestion Docente')
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@endsection
@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/styleCursos.css')
@vite('resources/css/informacion.css') 
<!--@vite('resources/js/crearUsuarioAdmin.js') -->
@vite('resources/css/desactivarUsuario.css')
<!-- @vite('resources/js/desactivarUsuario.js') -->

<!-- SE Agrega el .js para cargar los cursos del docente-->
@vite('resources/js/modulo-gestion-docente/listarCursosDocente.js')

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
    <div id="container-cursos-publicados">
    </div>



</div>

@endsection