@extends('Layouts.appDocente')
@section('title', 'Gestion Docente')
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@endsection
@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/gestionCrearCursos.css')
@vite('resources/js/crearUsuarioAdmin.js')
@vite('resources/css/informacion.css')
@vite('resources/css/desactivarUsuario.css')
@vite('resources/js/desactivarUsuario.js')
@endsection
@section('content')

<div class="container contenedorCursos">
        <!-- Formulario -->
        <form class="contenedorFormulario">
            <!-- Fila 1 -->
            <div class="row">
                <div class="col-md-3">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" placeholder="Título del curso">
                </div>
                <div class="col-md-3">
                    
                    <button type="button" class="btn btn-primary" id="file-upload-button">Seleccionar Archivo</button>
                    <input type="text" id="file-name" disabled>
                    <input type="file" class="fileedos" style="display: none;">
                </div>
                <div class="col-md-3">
                    <label for="fechaInicio">Fecha de Inicio:</label>
                    <input type="date" class="form-control" id="fechaInicio">
                </div>
                <div class="col-md-3">
                    <label for="fechaFin">Fecha de Finalización:</label>
                    <input type="date" class="form-control" id="fechaFin">
                </div>
            </div>
            <!-- Fila 2 -->
            <div class="row">
                <div class="col-md-3">
                    <label for="modalidad">Modalidad:</label>
                    <select class="form-control" id="modalidad">
                        <option value="presencial">Presencial</option>
                        <option value="en línea">En línea</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="tutor">Tutor:</label>
                    <input type="text" class="form-control" id="tutor" placeholder="Nombre del tutor">
                </div>
                <div class="col-md-3">
                    <label for="categoria">Categoría:</label>
                    <select class="form-control" id="categoria">
                        <option value="categoria1">Categoría 1</option>
                        <option value="categoria2">Categoría 2</option>
                    </select>
                </div>
            </div>
            <!-- Fila 3 -->
            <div class="row">
                <div class="col-md-3">
                    <label for="horarios">Horarios:</label>
                    <input type="text" class="form-control" id="horarios" placeholder="Horarios del curso">
                </div>
                <div class="col-md-3">
                    <label for="cupos">Cupos Disponibles:</label>
                    <input type="number" class="form-control" id="cupos">
                </div>
            </div>
            <!-- Fila 4 -->
            <div class="row">
                <div class="col-md-6">
                    <label for="descripcion">Descripción del Curso:</label>
                    <textarea class="form-control" id="descripcion" rows="4" placeholder="Descripción del curso"></textarea>
                </div>
            </div>
            <!-- Botón de envío -->
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection