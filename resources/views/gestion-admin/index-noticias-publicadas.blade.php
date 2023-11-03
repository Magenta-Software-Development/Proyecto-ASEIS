
@if(Auth::user()->rol == 'Administrador')
@extends('Layouts.app')
@section('title', 'Gestion de admin')
@endif

@if(Auth::user()->rol == 'Docente')
@extends('Layouts.appDocente')
@section('title', 'Gestion de admin')
@endif

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@endsection

@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-noticias-publicadas.css')



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
            </div>

            <div class="col-sm-5 custom-align-bottom"><!-- botones de mas informacion y habilitar -->

                <div class="botonCurso botonFiltroActivoCurso">
                    <a href="#">
                        <button>
                            más información
                        </button>
                    </a>
                </div>

                <div class="botonCurso botonFiltroDesactivoCurso d-flex">
                    <a href="#">
                        <button type="button" class="btn btn-light botonesCurso letrabtnEliminar" data-bs-toggle="modal" data-bs-target="#eliminarCategoria" data-id-categoria="${categoria.id_categoria}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                fill="none">
                                <path
                                    d="M7 21.5C6.45 21.5 5.979 21.304 5.587 20.912C5.195 20.52 4.99933 20.0493 5 19.5V6.5H4V4.5H9V3.5H15V4.5H20V6.5H19V19.5C19 20.05 18.804 20.521 18.412 20.913C18.02 21.305 17.5493 21.5007 17 21.5H7ZM9 17.5H11V8.5H9V17.5ZM13 17.5H15V8.5H13V17.5Z"
                                    fill="#FF0000" />
                                </svg>
                                <p class="letraBoton" style="padding-top: 10%">Eliminar</p>
                            </button>
                    </a>
                </div>
            </div>
        </div>

   </div>

</div>

@endsection
