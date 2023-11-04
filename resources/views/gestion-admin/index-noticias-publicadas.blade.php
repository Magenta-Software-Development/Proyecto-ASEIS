
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
                        <button  data-bs-toggle="modal" data-bs-target="#modalMasInfo">
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

       <!-- Modal -->
        <div class="modal fade" id="modalMasInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <!-- Encabezado de el modal -->
                    <div class="modal-header">
                        <h5 class="modal-title h4" id="exampleModalXlLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerca"></button>
                    </div>
                    <!-- cuerpo de el modal -->
                    <div class="modal-body">

                        <!-- Encabezado -->
                        <div class="row">
                            <div class="col-12 fuente-encabezado">
                                <p>KDC El Salvador 2023</p>
                            </div>
                        </div>

                        <!-- banner -->
                        <div class="row">
                            <div class="col-12">
                                <img class="imagen-banner" src="{{ asset('images/Rectangle 56.png') }}">
                            </div>
                        </div>

                        <!-- contenido de la noticia -->
                        <div class="row">
                            <div class="col-12 contenido-noticia">
                                <p>Kubernetes Community Days es un encuentro diseñado para reunir a profesionales, entusiastas y curiosos de la tecnología que deseen explorar el mundo de Kubernetes. Será una jornada llena de charlas magistrales, talleres prácticos y oportunidades para establecer conexiones con expertos en la materia. Kubernetes Community Days es un encuentro diseñado para reunir a profesionales, entusiastas y curiosos de la tecnología que deseen explorar el mundo de Kubernetes. Será una jornada llena de charlas magistrales, talleres prácticos y oportunidades para establecer conexiones con expertos en la materia. Kubernetes Community Days es un encuentro diseñado para reunir a profesionales, entusiastas y curiosos de la tecnología que deseen explorar el mundo de Kubernetes. Será una jornada llena de charlas magistrales, talleres prácticos y oportunidades para establecer conexiones con expertos en la materia. Kubernetes Community Days es un encuentro diseñado para reunir a profesionales, entusiastas y curiosos de la tecnología que deseen explorar el mundo de Kubernetes. Será una jornada llena de charlas magistrales, talleres prácticos y oportunidades para establecer conexiones con expertos en la materia. Kubernetes Community Days es un encuentro diseñado para reunir a profesionales, entusiastas y curiosos de la tecnología que deseen explorar el mundo de Kubernetes. Será una jornada llena de charlas magistrales, talleres prácticos y oportunidades para establecer conexiones con expertos en la materia.</p>
                            </div>

                        </div>

                        <!-- botones de editar y eliminar -->
                        <div class="row mt-5">
                            <div class="col-6 align-items-center justify-content-center d-flex">
                                <button class="btn-editar-noticia">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19.3 8.925L15.05 4.725L16.45 3.325C16.8333 2.94167 17.3043 2.75 17.863 2.75C18.4217 2.75 18.8923 2.94167 19.275 3.325L20.675 4.725C21.0583 5.10833 21.2583 5.571 21.275 6.113C21.2917 6.655 21.1083 7.11733 20.725 7.5L19.3 8.925ZM17.85 10.4L7.25 21H3V16.75L13.6 6.15L17.85 10.4Z" fill="white"/>
                                </svg>
                                    <p>Editar</p>
                                </button>
                            </div>

                            <div class="col-6 align-items-center justify-content-center d-flex">
                                <button class="btn-eliminar-noticia">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M7 21C6.45 21 5.979 20.804 5.587 20.412C5.195 20.02 4.99933 19.5493 5 19V6H4V4H9V3H15V4H20V6H19V19C19 19.55 18.804 20.021 18.412 20.413C18.02 20.805 17.5493 21.0007 17 21H7ZM9 17H11V8H9V17ZM13 17H15V8H13V17Z" fill="#FF0000"/>
                                </svg>
                                    <p>Eliminar</p>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</div>

@endsection
