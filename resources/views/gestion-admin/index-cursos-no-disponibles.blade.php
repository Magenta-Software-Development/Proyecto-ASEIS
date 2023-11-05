@if ($rol == 'Admin')
    @extends('Layouts.app')
    @section('title', 'Gestion de admin')
@endif

@if ($rol == 'Docente')
    @extends('Layouts.appDocente')
    @section('title', 'Gestion de admin')
@endif

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@vite('resources/js/modulo-admin/cursos-no-disponibles.js')
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
        <input type="text" class="InputBuscar" placeholder="Buscar" />
   </div>

   <!-- contenedor de cursos-->
    <div id="container-cursos-no-publicados">
    </div>

</div>

@endsection