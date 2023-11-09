@extends('Layouts.appDocente')
@section('title', 'Creacion de cursos - Docente')

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@vite('resources/js/modulo-gestion-docente/crearCursos.js')
@endsection

@section('scripts')
@vite('resources/js/cargarFotoCurso.js')
@endsection

@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/gestionCrearCursos.css')
@vite('resources/css/informacion.css')
@vite('resources/css/desactivarUsuario.css')

@endsection
@section('content')

<div class="container contenedorCursos">
    <!-- Formulario -->
    <form class="contenedorFormulario">
        <!-- Fila 1 -->
        <div class="row">
            <div class="col-md-5">
                <label for="titulo" class="TextosForm">Título</label>
                <input type="text" class="form-control" id="titulo" placeholder="">
            </div>

            <!--
            <div class="col-md-3">
                <label for="button" class="btn btn-primary" id="button-cargarFoto">Subir una foto</label>
                <input type="file" class="fileCargar" style="display: none;" id="button">
            </div>
            -->
            <div class="col-md-4 InpArchivo">
                <input type="file" class="form-control" accept="image/jpeg, image/png" id="archivo-cargado" placeholder="">
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <label for="fechaInicio" class="TextosForm">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fechaInicio">
            </div>
            <div class="col-md-4">
                <label for="fechaFin" class="TextosForm">Fecha de Finalización</label>
                <input type="date" class="form-control" id="fechaFin">
            </div>
            <div class="col-md-4">
                <label for="modalidad" class="TextosForm">Modalidad</label>
                <select class="form-select form-control" id="modalidad" aria-label="Default select example">
                    <option disabled selected>Seleccione la modalidad</option>
                </select>
            </div>

        </div>

        <!-- Fila 3 -->
        <div class="row">

            <div class="col-md-6">
                <label for="tutor" class="TextosFormdos">Tutor</label>
                <input type="text" class="form-control" id="tutor" placeholder="" disabled>
            </div>
            <div class="col-md-6">
                <label for="categoria" class="TextosFormdos">Categoría</label>
                <select class="form-select form-control" id="categoria" aria-label="Default select example">
                    <option disabled selected>Seleccione una categoría</option>
                </select>
            </div>
        </div>
        <!-- Fila 4 -->
        <div class="row">
            <div class="col-md-6">
                <label for="horarios" class="TextosFormtres">Horarios</label>
                <input type="text" class="form-control" id="horarios" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="cupos" class="TextosFormCupos">Cupos Disponibles</label>
                <input type="number" class="form-control" id="cupos" min="1">
            </div>
        </div>

        <!-- Fila 5 -->
        <div class="row">

            <div class="col-md-12">
                <label for="descripcion" class="TextosFormDescripcion">Descripción del Curso</label>
                <textarea class="form-control" id="descripcionC" rows="4" placeholder=""></textarea>
            </div>
        </div>
        <!-- seccion 2 del forumalario para los contenidos-->
        <div class="row">
            <div class="col-md-8">
                <label for="contenidoTituloCrear" class="ajusteContenido">Contenido</label>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary ajusteBoton" data-bs-toggle="modal" data-bs-target="#mCrearContenidoCurso">
                    Agregar Contenido</button>
            </div>
        </div>

        <!--Contenedor para poder almacenar el codigo html del js, ya que se crea dinamicamente desde el js
        De igual manera se crea una estructura como la que se habia definido la cual está en el js-->
        <div id="contenedor-acordeones"></div>

        <!-- seccion de acordeon de los contenidos-->
        <!-- Modal comentado ya que el que se necesita esta en el js
        <div class="row">
            <div class="col-md-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <label for="descripcionAcordion">Introducción</label>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body" style="visibility:visible !important">Bienvenido a la introduccion</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Fin de la estructura del modal-->

        <div class="row">
            <div class="col-md-12 contBtnCurso">
                <button id="btnCrearCurso" type="submit" class="btn btn-primary btnCrearCursos">Crear Curso</button>
            </div>
        </div>
    </form>

</div>


<!-- Modal para crear un curso -->
<div class="modal fade modal-move-in-right" id="mCrearContenidoCurso" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">

                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="Titulo-Modal" id="ContenidoModalText">Contenido</h5>
                            <label for="titulo" class="TextosForm medFormModal">Título</label>
                            <input type="text" class="form-control mx-auto" id="tituloModal" placeholder="">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <label for="descripcion" class="TextosFormDescripcion alturaDescripc medFormModal">Descripción del Curso</label>
                            <textarea class="form-control mx-auto" id="descripcionModal" rows="4" placeholder=""></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="grupBotones">
                            <button type="button" class="btn btn-secondary button-common btn-Cancelar" data-bs-dismiss="modal" id="btn-Cancelar">Cancelar</button>
                            <button type="button" class="btn btn-dark button-common btn-GuardaCambios" id="btn-Crear" data-bs-dismiss="modal">Crear</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection