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
    @vite('resources/css/modalEliminarDeCursos.css')
@endsection

@section('content')

    <div class="contenedorPrincipal">

        <!-- area de busqueda -->
        <div class="contenedorBusqueda">
            <input type="text" class="InputBuscar" placeholder="Buscar" id="inputBusqueda" />
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
                                    <img class="imgColumnaIzquierda" id="imagenCurso"
                                        src="{{ asset('images/Rectangle 55.png') }}">
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
                                                    <label for="fechaI" class="medidaFechas">
                                                        <p id="fechaInicioCurso">20 de Noviembre 2023</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row medFila">
                                                <div class="col-md-2">
                                                    <p>Finalización:</p>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="fechaF" class="medidaFechas">
                                                        <p id="fechaFinCurso">20 de Diciembre 2023</p>
                                                    </label>
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
                                                    <label for="fechaI" class="medidaFechas">
                                                        <p id="horarioCurso">Lunes, Martes, Jueves, Viernes y sabado, 7 a.m.
                                                            - 10 a.m.</p>
                                                    </label>
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
                                                    <label for="lblMod" class="medidaFechas">
                                                        <p id="modalidadCurso">Presencial</p>
                                                    </label>
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
                                                    <label for="lblTutor" class="medidaFechas">
                                                        <p id="tutorAsignado">Hector Javier Paiz</p>
                                                    </label>
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
                                                    <label for="lblCupos" class="medidaFechas">
                                                        <p id="cuposCurso">50</p>
                                                    </label>
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
                                                    <label for="lblCupos" class="medidaFechas">
                                                        <p id="puntuacionCurso">10</p>
                                                    </label>
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
                                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                                                Fugiat ipsum molestiae sint ab
                                                                laudantium placeat necessitatibus modi sapiente voluptatum
                                                                expedita quam at dolores, temporibus explicabo, itaque
                                                                ratione odit? Eos, sunt?
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                Laboriosam aliquam aliquid eum voluptatum animi nisi
                                                                assumenda deleniti provident labore, est mollitia explicabo
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
                                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_ANn3QhxrnpEDbVVoG4sutpEF16LCntBjLg&usqp=CAU"
                                                                    alt="Perfil del Estudiante"
                                                                    class="foto-estudianteP fotoContenedor"
                                                                    id="fotoPerfil" />
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <h5 class="EstudianteC" id="nombreEstudiante">Nayib
                                                                        Bukele Armando Ortez</h5>
                                                                </div>
                                                                <div class="row">
                                                                    <p class="EstudianteC" id="rolE">Estudiante</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div
                                                                class="col-md-12 d-flex justify-content-center align-items-center containerBtnMas">
                                                                <a
                                                                    href="{{ route('app_index_ver_alumnos_inscritos_Admin') }}">
                                                                    <button class="estilosBtn" id="btnVerMasEst">
                                                                        <i class="fa-solid fa-user"></i>
                                                                        <p id="textBtnMasEstudiantes">Ver Más Estudiantes
                                                                        </p>
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
                                
                                <div class="contenedorDeComentarios" id="commentsContainer">


                                    <!-- FIN DE MODALS PARA ELIMINAR COMENTARIO DE CURSO -->

                                </div>
                                    <!-- MODALS PARA ELIMINAR COMENTARIO Y DESHABILITAR CURSO -->
                                    <div id="myModal" class="modal-wrapper">
                                        <div class="modal-content">
                                            <span class="close-btn" onclick="closeModal()">&times;</span>
                                            <svg class="estiloForma" xmlns="http://www.w3.org/2000/svg"
                                                width="240" height="203" viewBox="0 0 240 203"
                                                fill="none">
                                                <path
                                                    d="M135.263 9.28369L236.713 176.893C238.26 179.449 239.074 182.348 239.074 185.299C239.074 188.25 238.26 191.15 236.713 193.705C235.166 196.261 232.941 198.384 230.262 199.859C227.582 201.335 224.543 202.112 221.449 202.112H18.5503C15.4565 202.112 12.4173 201.335 9.73799 199.859C7.05871 198.384 4.83383 196.261 3.28697 193.705C1.74011 191.15 0.925762 188.25 0.925781 185.299C0.925801 182.348 1.74018 179.449 3.28708 176.893L104.737 9.28369C111.516 -1.92464 128.472 -1.92464 135.263 9.28369ZM120 28.8983L28.7258 179.695H211.274L120 28.8983ZM120 142.125C123.116 142.125 126.105 143.306 128.308 145.408C130.512 147.51 131.75 150.361 131.75 153.333C131.75 156.306 130.512 159.157 128.308 161.259C126.105 163.361 123.116 164.542 120 164.542C116.884 164.542 113.895 163.361 111.691 161.259C109.488 159.157 108.25 156.306 108.25 153.333C108.25 150.361 109.488 147.51 111.691 145.408C113.895 143.306 116.884 142.125 120 142.125ZM120 63.6665C123.116 63.6665 126.105 64.8474 128.308 66.9494C130.512 69.0513 131.75 71.9022 131.75 74.8749V119.708C131.75 122.681 130.512 125.532 128.308 127.634C126.105 129.736 123.116 130.917 120 130.917C116.884 130.917 113.895 129.736 111.691 127.634C109.488 125.532 108.25 122.681 108.25 119.708V74.8749C108.25 71.9022 109.488 69.0513 111.691 66.9494C113.895 64.8474 116.884 63.6665 120 63.6665Z"
                                                    fill="#D30A0A" />
                                            </svg>
                                            <p class="mensaje">¿Estás seguro Eliminar el comentario?</p>
                                            <br>
                                            <div class="buttons">
                                                <button class="cancel-btn"
                                                    onclick="closeModal()">Cancelar</button>
                                                <button class="disable-btn" id="EliminarBtn" onclick="closeModal()">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                
                                <!-- Final del contenedor que engloba a todos los comentarios de la Modal C -->
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

                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('app_index_editar_cursoPublicado') }}">
                                                <button class="estilosBtn" id="btnEditarCurso"
                                                    data-toggle="modal" data-target="#modalEliminarComentario">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <p id="textBtnEditCurso">Editar</p>
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

<script>
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }
</script>

@endsection
