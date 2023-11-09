@extends('Layouts.app')
@section('title', 'Gestion de admin')

{{-- @if ($rol == 'Docente')
    @extends('Layouts.appDocente')
    @section('title', 'Gestion de admin')
@endif --}}

@section('scripts')
@vite('resources/js/modulo-admin/cursos-no-disponibles.js')
@endsection

@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/styleCursos.css')
@vite('resources/css/infoCursosModal.css')
@vite('resources/css/informacion.css')
@endsection

@section('content')

<div class="contenedorPrincipal">

    <!-- area de busqueda -->
    <div class="contenedorBusqueda">
        <input type="text" class="InputBuscar" placeholder="Buscar" id="inputBusqueda"/>
    </div>

    <!-- contenedor de cursos-->
    <div id="container-cursos-no-publicados">

    </div>

    <div class="modal" id="modalMasInformacion" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-fullscreen-sm-down" role="document">
            <div class="modal-content">
                <!-- Contenido del modal -->
                <div class="modal-header">
                    <span class="iconoCerrarModal"><i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i></span>
                </div>
                <div class="modal-body modal-content-scroll">
                    <div class="contModalInfoCursos">
                        <div class="row">
                            <div class="col-md-6 columna-imagen">
                                <!-- Contenido de la primera columna -->
                                <img class="imgColumnaIzquierda" id="imagenCurso" src="{{ asset('images/Rectangle 55.png') }}">
                            </div>
                            <div class="col-md-6">
                                <!-- Contenido de la segunda columna de este contenedor -->
                                    <div class="row">
                                    <!-- Fila del titulo del curso -->
                                        <div class="col-md-12 contenidoHeaderCol">
                                            <h4 id="tituloCurso">Introducción a Python</h4>
                                        </div>
                                        <!-- Filas con los iconos y detalles-->
                                        <div class="col-md-2 iconosModal espacioFilas">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </div>
                                        <div class="col-md-10 espacioFilas">
                                                <div class="row medFila">
                                                    <div class="col-md-2">
                                                        <p>Inicio:</p>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="fechaI" class="medidaFechas"><p id="fechaInicioCurso">20 de Noviembre 2023</p></label>
                                                    </div>
                                                </div>
                                                <div class="row medFila">
                                                    <div class="col-md-2">
                                                        <p>Finalización:</p>
                                                    </div>
                                                    <div class="col-md-10">
                                                    <label for="fechaF" class="medidaFechas"><p id="fechaFinCurso">20 de Diciembre 2023</p></label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-2 iconosModal espacioFilas">
                                            <i class="fa-solid fa-clock"></i>
                                        </div>
                                        <div class="col-md-10 espacioFilas">
                                                <div class="row medFila">
                                                    <div class="col-md-2">
                                                        <p>Horario:</p>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="fechaI" class="medidaFechas"><p id="horarioCurso">Lunes, Martes, Jueves, Viernes y sabado, 7 a.m. - 10 a.m.</p></label>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="col-md-2 iconosModal espacioFilas">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="col-md-10 espacioFilas">
                                                <div class="row medFila">
                                                    <div class="col-md-2">
                                                        <p>Modalidad:</p>
                                                    </div>
                                                    <div class="col-md-10">
                                                    <label for="lblMod" class="medidaFechas"><p id="modalidadCurso">Presencial</p></label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-2 iconosModal espacioFilas">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <div class="col-md-10 espacioFilas">
                                                <div class="row medFila">
                                                    <div class="col-md-2">
                                                        <p>Tutor:</p>
                                                    </div>
                                                    <div class="col-md-10">
                                                    <label for="lblTutor" class="medidaFechas"><p id="tutorAsignado">Hector Javier Paiz</p></label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-2 iconosModal espacioFilas">
                                            <i class="fa-solid fa-user-group"></i>
                                        </div>
                                        <div class="col-md-10 espacioFilas">
                                                <div class="row medFila">
                                                    <div class="col-md-2">
                                                        <p>Cupos Disponibles:</p>
                                                    </div>
                                                    <div class="col-md-10">
                                                    <label for="lblCupos" class="medidaFechas"><p id="cuposCurso">50</p></label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-2 iconosModal espacioFilas">
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <div class="col-md-10 espacioFilas">
                                                <div class="row medFila">
                                                    <div class="col-md-2">
                                                        <p>Calificación:</p>
                                                    </div>
                                                    <div class="col-md-10">
                                                    <label for="lblCupos" class="medidaFechas"><p id="puntuacionCurso">10</p></label>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div> <!-- Final primera seccion -->

                        <!-- Inicio segunda seccion detalles del curso -->
                        <div class="contModalDetallesCursos">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Contenido de la segunda columna de este contenedor -->
                                    <div class="row">
                                    <!-- Fila del titulo del curso -->
                                        <div class="col-md-12 contenidoHeaderCol DescripcionSect">
                                            <h4>Descripción del Curso</h4>
                                        </div>
                                        <div class="col-md-12 espacioFilas">
                                                <div class="row medFila">
                                                    <div class="col-md-12">
                                                        <label for="descripCurso" class="lblmedidaDescrip">
                                                            <p id="descripcionCurso">
                                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat ipsum molestiae sint ab
                                                                laudantium placeat necessitatibus modi sapiente voluptatum expedita quam at dolores, temporibus explicabo, itaque ratione odit? Eos, sunt?
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam aliquam aliquid eum voluptatum animi nisi assumenda deleniti provident labore, est mollitia explicabo
                                                                omnis voluptates aspernatur perspiciatis modi enim ad sunt.
                                                            </p>
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>

                                    </div>
                            </div>
                        </div> <!-- Final segunda seccion -->

                        <!-- Inicio tercera seccion contenidos del curso -->
                        <div class="contModalContentCursos">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 contenidoHeaderCol DescripcionSect">
                                                <h4>Contenido</h4>
                                            </div>
                                            <div id="contenedorTemarioCurso">

                                            </div>
                                        </div>


                                </div>
                            </div> <!-- Final tercera seccion -->

                        <!-- Inicio cuarta seccion estudiantes del curso -->
                        <div class="contModalEstudiantes">
                            <div class="row">
                                    <div class="row">
                                        <div class="col-md-12 contenidoHeaderCol DescripcionSect">
                                            <h4>Estudiantes</h4>
                                        </div>
                                        <div class="tarjetaEstModal">
                                            <div class="tarjetaEstModal-body">
                                                <div class="row">
                                                    <div class="col-md-2 fotoContenedor">
                                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_ANn3QhxrnpEDbVVoG4sutpEF16LCntBjLg&usqp=CAU" alt="Perfil del Estudiante" class="foto-estudianteP fotoContenedor" id="fotoPerfil" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <h5 class="EstudianteC" id="nombreEstudiante">Nayib Bukele Armando Ortez</h5>
                                                        </div>
                                                        <div class="row">
                                                            <p class="EstudianteC" id="rolE">Estudiante</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-center align-items-center containerBtnMas">
                                                        <a href="{{route('app_index_ver_alumnos_inscritos_Admin')}}">
                                                            <button class="estilosBtn" id="btnVerMasEst">
                                                            <i class="fa-solid fa-user"></i><p id="textBtnMasEstudiantes">Ver Más Estudiantes</p>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div> <!-- Final de la cuarta sección -->


                        <!-- Inicio quinta seccion Comentarios del curso -->
                        <div class="contModalComentarios">
                            <div class="row">
                                    <div class="row">
                                        <div class="col-md-12 contenidoHeaderCol DescripcionSect">
                                            <h4>Comentarios</h4>
                                        </div>
                                        <div class="contenedorDeComentarios">
                                        <div class="tarjetaEstModalC">
                                            <div class="tarjetaEstModal-body">
                                                <div class="row">
                                                    <div class="col-md-2 fotoContenedor">
                                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_ANn3QhxrnpEDbVVoG4sutpEF16LCntBjLg&usqp=CAU" alt="Foto del Estudiante" class="foto-estudianteP fotoContenedor" id="fotoPerfil" />
                                                    </div>
                                                    <div class="tarjetaComentario">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                <h5 class="EstudianteC" id="nombreEstudiante">Nayib Bukele Armando Ortez</h5>
                                                                </div>

                                                            </div>
                                                            <div class="row comentarioEs">
                                                                <p class="EstudianteC" id="comentarioE"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas, velit! Perspiciatis doloremque modi nulla unde odit dolor odio! Necessitatibus asperiores voluptatum placeat porro perspiciatis reiciendis corporis fugiat nemo repellendus architecto.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur explicabo asperiores error nostrum. Itaque voluptatum eos consectetur quis, nostrum doloremque ab optio, sapiente eligendi, dolores ad expedita excepturi commodi possimus.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam consequatur earum et enim ipsa corrupti amet veniam praesentium hic at, ducimus aliquid animi non in illo nulla magni, obcaecati libero.</p></p>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 d-flex justify-content-center align-items-center contenedorBotonEC">
                                                                    <button class="estilosBtn" id="btnComentarioE" data-toggle="modal" data-target="#modalEliminarComentario">
                                                                    <i class="fa-solid fa-trash-can"></i><p id="textBtnComentario">Eliminar Comentario</p>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- Final de la Modal C -->


                                        </div><!-- Final del contenedor que engloba a todos los comentarios de la Modal C -->
                                    </div>
                            </div>
                        </div> <!-- Final de la quinta sección -->

                        <!-- Inicio ultima seccion botones del curso -->
                        <div class="contModalBotonesCursos">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="row">
                                         <!-- seccion de de botones de los contenidos-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="estilosBtn" id="btnDeshabilitarCurso" data-toggle="modal" data-target="#modalEliminarComentario">
                                                <i class="fa-solid fa-ban"></i><p id="textBtnDesCurso">Deshabilitar</p>
                                                </button>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{ route('app_index_editar_cursoNoDisponible') }}">
                                                    <button class="estilosBtn" id="btnEditarCurso" data-toggle="modal" data-target="#modalEliminarComentario">
                                                        <i class="fas fa-pencil-alt"></i> <p id="textBtnEditCurso">Editar</p>
                                                    </button>   
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                            </div>
                        </div> <!-- Final ultima seccion -->

                    </div><!-- Final de contModalInfoCursos -->
                </div><!-- Final de body -->
            </div>
        </div>
    </div>
</div>

@endsection
