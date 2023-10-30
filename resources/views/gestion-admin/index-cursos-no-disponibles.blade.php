@extends('Layouts.appDocente')
@section('title', 'Gestion de admin')
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@endsection
@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/styleCursos.css')
@vite('resources/js/crearUsuarioAdmin.js')
@vite('resources/css/informacion.css')
@vite('resources/css/desactivarUsuario.css')
@vite('resources/js/desactivarUsuario.js')
@endsection
@section('content')

<div class="contenedorPrincipal">

    <!-- area de busqueda -->
   <div class="contenedorBusqueda">
        <input type="text" class="InputBuscar" placeholder="Buscar" />
   </div>

   <!-- contenedor de cursos-->
   <div class="container contenedorCursos">

        <div class="row tablaContenidosCursos">

            <div class="col-sm-4 align-items-start"><!-- imagen del curso -->
                <img class="contenedorImagen" src="{{ asset('images/Rectangle 55.png') }}">
            </div>

            <div class="col-sm-3"><!-- nombre del curso y de el docente -->
                <div class="contenedorNombreCurso">Introducción a Python</div>
                <div class="contenedorNombreDocente">Héctor Javier Paiz</div>
            </div>

            <div class="col-sm-5 custom-align-bottom"><!-- botones de mas informacion y habilitar -->
                
                <div class="botonCurso botonFiltroDesactivoCurso">
                    <a href="#">
                        <button>
                            más información
                        </button>
                    </a>                
                </div>

                <div class="botonCurso botonFiltroActivoCurso">
                    <a href="#">
                        <button>
                            Habilitar
                        </button>
                    </a>
                </div>
            </div>
        </div>

   </div>

</div>

@endsection