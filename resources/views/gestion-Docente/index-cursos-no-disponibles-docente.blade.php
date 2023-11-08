@extends('Layouts.appDocente')

@section('title', 'Gestion Docente')

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<!-- SE Agrega el .js para cargar los cursos del docente-->
@vite('resources/js/modulo-gestion-docente/listarCursosNoDisponibles.js')
@endsection

@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/styleCursos.css')
@vite('resources/css/infoCursosModal.css')

<!--
@vite('resources/js/crearUsuarioAdmin.js')
@vite('resources/css/informacion.css')
@vite('resources/css/desactivarUsuario.css')
-->



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

    <div id="container-cursos-publicados"></div>

    <!-- 
    <div class="container contenedorCursos">

        <div class="row tablaContenidosCursos">

            <div class="col-sm-4 align-items-start">
                <img class="contenedorImagen" src="{{ asset('images/Rectangle 55.png') }}">
            </div>

            <div class="col-sm-3">
                <div class="contenedorNombreCurso">
                    <h4>Introducción a Python</h4>
                </div>
                <div class="contenedorNombreDocente">Héctor Javier Paiz</div>
            </div>

            <div class="col-sm-5 custom-align-bottom">

                <div class="botonCurso botonFiltroDesactivoCurso">

                    <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" type="button">
                        Mas informacion
                    </button>

                </div>

                <div class="botonCurso botonFiltroActivoCurso">
                    <a>
                        <button>
                            Habilitar
                        </button>
                    </a>
                </div>
            </div>
        </div>
        
        
    </div>
    contenedor de cursos-->

</div>

<!-- Extra Large Modal -->
<div id="extralarge-modal" tabindex="-1" class="fixed top-0 left-0 right-0 bottom-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto bg-white md:inset-0">
    <div class="relative w-full max-w-screen-xl h-full m-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Extra Large modal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="modal-body modal-content-scroll">
                    <div class="contModalInfoCursos">
                        <div class="row">
                            <div class="col-md-6 columna-imagen">
                                <!-- Contenido de la primera columna -->
                                <img class="imgColumnaIzquierda" src="{{ asset('images/Rectangle 55.png') }}">
                            </div>
                            <div class="col-md-6">
                                <!-- Contenido de la segunda columna de este contenedor -->
                                <div class="row">
                                    <!-- Fila del titulo del curso -->
                                    <div class="col-md-12 contenidoHeaderCol">
                                        <h4>Introducción a Python</h4>
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
                                                <label for="fechaI" class="medidaFechas" id="fechaInicioCurso">
                                                    <p>20 de Noviembre 2023</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row medFila">
                                            <div class="col-md-2">
                                                <p>Finalización:</p>
                                            </div>
                                            <div class="col-md-10">
                                                <label for="fechaF" class="medidaFechas" id="fechaFinCurso">
                                                    <p>20 de Diciembre 2023</p>
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
                                                <label for="fechaI" class="medidaFechas" id="fechaInicioCurso">
                                                    <p>Lunes, Martes, Jueves, Viernes y sabado, 7 a.m. - 10 a.m.</p>
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
                                                <label for="lblMod" class="medidaFechas" id="modalidadCurso">
                                                    <p>Presencial</p>
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
                                                <label for="lblTutor" class="medidaFechas" id="tutorAsignado">
                                                    <p>Hector Javier Paiz</p>
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
                                                <label for="lblCupos" class="medidaFechas" id="cuposCurso">
                                                    <p>50</p>
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
                                                <label for="lblCupos" class="medidaFechas" id="cuposCurso">
                                                    <p>10</p>
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
                                                    <label for="descripCurso" class="lblmedidaDescrip" id="descripCursoModal">
                                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
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
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 contenidoHeaderCol DescripcionSect">
                                                <h4>Contenido</h4>
                                            </div>
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                            <label for="descripcionAcordion">Introducción</label>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">¡bienvenidos al primer curso de la
                                                            asignatura! Lorem ipsum, dolor sit ame
                                                            consectetur adipisicing elit. Hic ad minus repudiandae
                                                            quidem cum neque similique ex possimus corrupti laudantium
                                                            iure adipisci quis,
                                                            eveniet dicta obcaecati praesentium nostrum. Sed, itaque.
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Alias dolor consectetur hic totam tempora eos, minima
                                                            dolorum commodi dolorem nam laborum possimus dicta, at amet
                                                            eum illum tempore est ipsam.
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Libero vero dolorum magnam non quo facilis deserunt nemo
                                                            ipsa expedita reprehenderit dignissimos rem laboriosam
                                                            nostrum ipsum, voluptates autem cum? Dolores, consequuntur.
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                                                            perferendis corporis quis itaque distinctio, deleniti soluta
                                                            totam aut, eius perspiciatis, quia neque ex commodi nemo
                                                            error rerum veniam ratione corrupti.
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Maxime, rem iure non repellat quae dolore laudantium animi,
                                                            doloribus minus optio accusamus beatae, quod cum perferendis
                                                            facilis! Ipsum optio animi in!
                                                        </div>
                                                    </div>
                                                </div>
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
                                                                <h5 class="EstudianteC" id="nombreEstudiante">Nayib
                                                                    Bukele Armando Ortez</h5>
                                                            </div>
                                                            <div class="row">
                                                                <p class="EstudianteC" id="rolE">Estudiante</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 d-flex justify-content-center align-items-center">
                                                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="btnVerMas" type="button">
                                                                <i class="fa-solid fa-user"></i>
                                                                <p id="textBtnInfoEstudiante">Ver Más</p>
                                                            </button>

                                                        </div>
                                                    </div>


                                                    <!--Modal para mostrar la informacion del estudiante-->

                                                    <!-- Main modal -->
                                                    <div id="default-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative w-full max-w-2xl max-h-full">
                                                            <!-- Modal content -->
                                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                                                <!-- Modal body -->
                                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                    <div class="modal-content modal-gestion">
                                                                        <div class="modal-body">
                                                                            <!-- Botón de retroceso -->
                                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                </svg>
                                                                                <span class="sr-only">Cerrar
                                                                                    modal</span>
                                                                            </button>
                                                                            <div class="d-flex justify-content-center align-items-center">
                                                                                <img src="" id="img_estudiante" alt="Usuario" class="img-fluid rounded-circle rounded-image">
                                                                            </div>
                                                                            <h5 class="text-center mt-3 modal-title" id="nombre_estudiante"></h5>
                                                                            <br>
                                                                            <p class="text-center text-white" id="estado_estudiante"></p>
                                                                            <br>
                                                                            <p class="text-center text-white" id="especialidad_estudiante">Estudiante
                                                                            </p>
                                                                            <br>
                                                                            <p class="text-center text-white" id="correo_estudiante"></p>
                                                                            <br>
                                                                            <p class="text-center text-white" id="descripcion_estudiante"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--FIN de Modal para mostrar la informacion del estudiante-->

                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-center align-items-center containerBtnMas">
                                                        <button data-modal-target="extralarge-modal2" data-modal-toggle="extralarge-modal2" class="estilosBtn" type="button">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p id="textBtnMasEstudiantes">Ver Más Estudiantes</p>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Final de la cuarta sección -->

                            <!-- Inicio del Large Modal ver todos los alumnos inscritos-->
                            <div id="extralarge-modal2" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class=" w-full">
                                    <!-- Modal content -->
                                    <div class="h-screen bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->

                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal2">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>

                                        <!-- Modal body -->
                                        <div class="modal-dialog modal-dialog-centered modal-lg ">
                                            <div class="modal-content modal-mostrarLista ">
                                                <div class="modal-body ">

                                                    <div class="tarjetaEstModal-body2">
                                                        <div class="scrolable">

                                                            <div class="row tarjetaEstModal2">
                                                                <div class="col-md-2 fotoContenedor">
                                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_ANn3QhxrnpEDbVVoG4sutpEF16LCntBjLg&usqp=CAU" alt="Perfil del Estudiante" class="foto-estudianteP fotoContenedor" id="fotoPerfil" />
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="row">
                                                                        <h5 class="EstudianteC" id="nombreEstudiante">
                                                                            Nayib
                                                                            Bukele Armando Ortez</h5>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="EstudianteC" id="rolE">
                                                                            Estudiante</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 d-flex justify-content-center align-items-center">
                                                                    <button data-modal-target="default-modal" data-modal-toggle="default-modal2" class="btnVerMas" type="button">
                                                                        <i class="fa-solid fa-user"></i>
                                                                        <p id="textBtnInfoEstudiante">Ver Más</p>
                                                                    </button>

                                                                </div>
                                                            </div>
                                                            <br>
                                                        </div>



                                                        <!--Modal para mostrar la informacion del estudiante-->

                                                        <!-- Main modal -->
                                                        <div id="default-modal2" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative w-full max-w-2xl max-h-full">
                                                                <!-- Modal content -->
                                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                                                    <!-- Modal body -->
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <div class="modal-content modal-gestion">
                                                                            <div class="modal-body">
                                                                                <!-- Botón de retroceso -->
                                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal2">
                                                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                    </svg>
                                                                                    <span class="sr-only">Cerrar
                                                                                        modal</span>
                                                                                </button>
                                                                                <div class="d-flex justify-content-center align-items-center">
                                                                                    <img src="" id="img_estudiante" alt="Usuario" class="img-fluid rounded-circle rounded-image">
                                                                                </div>
                                                                                <h5 class="text-center mt-3 modal-title" id="nombre_estudiante"></h5>
                                                                                <br>
                                                                                <p class="text-center text-white" id="estado_estudiante"></p>
                                                                                <br>
                                                                                <p class="text-center text-white" id="especialidad_estudiante">
                                                                                    Estudiante
                                                                                </p>
                                                                                <br>
                                                                                <p class="text-center text-white" id="correo_estudiante"></p>
                                                                                <br>
                                                                                <p class="text-center text-white" id="descripcion_estudiante"></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FIN de Modal para mostrar la informacion del estudiante-->



                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Fin del Large Modal ver todos los alumnos inscritos-->

                            <!-- Inicio quinta seccion Comentarios del curso -->
                            <div class="contModalComentarios">

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
                                                                    <h5 class="EstudianteC" id="nombreEstudiante">
                                                                        Nayib Bukele
                                                                        Armando Ortez</h5>
                                                                </div>

                                                            </div>
                                                            <div class="row comentarioEs">
                                                                <p class="EstudianteC" id="comentarioE">
                                                                <p>Lorem, ipsum dolor sit amet consectetur
                                                                    adipisicing elit. Quas, velit! Perspiciatis
                                                                    doloremque modi nulla unde odit dolor odio!
                                                                    Necessitatibus asperiores voluptatum placeat
                                                                    porro perspiciatis reiciendis corporis
                                                                    fugiat nemo repellendus architecto.Lorem
                                                                    ipsum dolor sit, amet consectetur
                                                                    adipisicing elit. Consequatur explicabo
                                                                    asperiores error nostrum. Itaque voluptatum
                                                                    eos consectetur quis, nostrum doloremque ab
                                                                    optio, sapiente eligendi, dolores ad
                                                                    expedita excepturi commodi possimus.Lorem
                                                                    ipsum dolor sit amet consectetur,
                                                                    adipisicing elit. Quisquam consequatur earum
                                                                    et enim ipsa corrupti amet veniam
                                                                    praesentium hic at, ducimus aliquid animi
                                                                    non in illo nulla magni, obcaecati libero.
                                                                </p>
                                                                </p>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 d-flex justify-content-center align-items-center contenedorBotonEC">
                                                                    <button class="estilosBtn" id="btnComentarioE" data-bs-toggle="modal" data-bs-target="#modalEliminarComentario">
                                                                        <i class="fa-solid fa-trash-can"></i>
                                                                        <p id="textBtnComentario">Eliminar
                                                                            Comentario</p>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2 fotoContenedor">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_ANn3QhxrnpEDbVVoG4sutpEF16LCntBjLg&usqp=CAU" alt="Foto del Estudiante" class="foto-estudianteP fotoContenedor" id="fotoPerfil" />
                                                    </div>
                                                    <div class="tarjetaComentario">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h5 class="EstudianteC" id="nombreEstudiante">
                                                                        Nayib Bukele
                                                                        Armando Ortez</h5>
                                                                </div>

                                                            </div>
                                                            <div class="row comentarioEs">
                                                                <p class="EstudianteC" id="comentarioE">
                                                                <p>Lorem, ipsum dolor sit amet consectetur
                                                                    adipisicing elit. Quas, velit! Perspiciatis
                                                                    doloremque modi nulla unde odit dolor odio!
                                                                    Necessitatibus asperiores voluptatum placeat
                                                                    porro perspiciatis reiciendis corporis
                                                                    fugiat nemo repellendus architecto.Lorem
                                                                    ipsum dolor sit, amet consectetur
                                                                    adipisicing elit. Consequatur explicabo
                                                                    asperiores error nostrum. Itaque voluptatum
                                                                    eos consectetur quis, nostrum doloremque ab
                                                                    optio, sapiente eligendi, dolores ad
                                                                    expedita excepturi commodi possimus.Lorem
                                                                    ipsum dolor sit amet consectetur,
                                                                    adipisicing elit. Quisquam consequatur earum
                                                                    et enim ipsa corrupti amet veniam
                                                                    praesentium hic at, ducimus aliquid animi
                                                                    non in illo nulla magni, obcaecati libero.
                                                                </p>
                                                                </p>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 d-flex justify-content-center align-items-center contenedorBotonEC">
                                                                    <button class="estilosBtn" id="btnComentarioE" data-bs-toggle="modal" data-bs-target="#modalEliminarComentario">
                                                                        <i class="fa-solid fa-trash-can"></i>
                                                                        <p id="textBtnComentario">Eliminar
                                                                            Comentario</p>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2 fotoContenedor">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_ANn3QhxrnpEDbVVoG4sutpEF16LCntBjLg&usqp=CAU" alt="Foto del Estudiante" class="foto-estudianteP fotoContenedor" id="fotoPerfil" />
                                                    </div>
                                                    <div class="tarjetaComentario">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h5 class="EstudianteC" id="nombreEstudiante">
                                                                        Nayib Bukele
                                                                        Armando Ortez</h5>
                                                                </div>

                                                            </div>
                                                            <div class="row comentarioEs">
                                                                <p class="EstudianteC" id="comentarioE">
                                                                <p>Lorem, ipsum dolor sit amet consectetur
                                                                    adipisicing elit. Quas, velit! Perspiciatis
                                                                    doloremque modi nulla unde odit dolor odio!
                                                                    Necessitatibus asperiores voluptatum placeat
                                                                    porro perspiciatis reiciendis corporis
                                                                    fugiat nemo repellendus architecto.Lorem
                                                                    ipsum dolor sit, amet consectetur
                                                                    adipisicing elit. Consequatur explicabo
                                                                    asperiores error nostrum. Itaque voluptatum
                                                                    eos consectetur quis, nostrum doloremque ab
                                                                    optio, sapiente eligendi, dolores ad
                                                                    expedita excepturi commodi possimus.Lorem
                                                                    ipsum dolor sit amet consectetur,
                                                                    adipisicing elit. Quisquam consequatur earum
                                                                    et enim ipsa corrupti amet veniam
                                                                    praesentium hic at, ducimus aliquid animi
                                                                    non in illo nulla magni, obcaecati libero.
                                                                </p>
                                                                </p>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 d-flex justify-content-center align-items-center contenedorBotonEC">
                                                                    <button class="estilosBtn" id="btnComentarioE" data-bs-toggle="modal" data-bs-target="#modalEliminarComentario">
                                                                        <i class="fa-solid fa-trash-can"></i>
                                                                        <p id="textBtnComentario">Eliminar
                                                                            Comentario</p>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- Final de la Modal C -->


                                    </div>
                                    <!-- Final del contenedor que engloba a todos los comentarios de la Modal C -->
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
                                                    <button class="estilosBtn" id="btnHabilitarCurso" data-bs-toggle="modal" data-bs-target="#modalEliminarComentario">
                                                        <i class="fa-solid fa-toggle-on"></i>
                                                        <p id="textBtnDesCurso">Habilitar</p>
                                                    </button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="estilosBtn" id="btnEditarCursoNoPublic" data-bs-toggle="modal" data-bs-target="#modalEliminarComentario">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        <p id="textBtnEditCurso">Editar</p>
                                                    </button>
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
        <!--Fin full screen modal -->



        @endsection