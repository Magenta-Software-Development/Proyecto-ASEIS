@extends('Layouts.appDocente')

@section('title', 'Creacion de noticias - Docente')

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
@vite('resources/js/modulo-gestion-docente/crearNoticiasDocente.js')
@endsection

@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/styleCursos.css')
@vite('resources/css/informacion.css')
<!--@vite('resources/js/BigBox.js')-->
@endsection
@section('content')


<div class="contenedorPrincipal">
    <!-- área de titulo -->
    <div class="row align-items-center justify-content-center" style="width: 80%;">
    <div class="col-12">
        <label for="inputT" class="estiloTitulo" style="width: 100% !important">Titulo de la noticia:</label>
        <input type="text" class="form-control inputTitulo" id="inputT" style="width: 100%;"/>
    </div>
</div>

<!-- área de archivo -->
<div class="row align-items-center justify-content-center" style="width: 80%;">
        <button class="botonArchivo botonNoticia col-4" id="botonSubir">
            Subir imagen de portada
        </button>
        <input type="file" id="imageInput" accept="image/*" style="display: none;">
    <div class="col-8">
        <input type="text" class="form-control inputTitulo" id="inputT" style="width: 100%;" disabled/>
    </div>

</div>

<!-- editor de texto BigBox -->
<div class="box">
    <div class="form-group">
        <textarea id="txtAreaParaNoticia" name="content" class="form-control"></textarea>
    </div>
</div>



<!-- boton para crear noticia -->

<div class="row align-items-center justify-content-center" style="width: 25%;">
    <div class="col-12">
        <button class="botonArchivo botonNoticia" id="btnCrearNoticias">
            <p>Crear noticia</p>
        </button>
    </div>

</div>

</div>


@endsection