
@if(Auth::user()->rol == 'Administrador')
@extends('Layouts.app')
@section('title', 'Gestion de admin')
@endif

@if(Auth::user()->rol == 'Docente')
@extends('Layouts.appDocente')
@section('title', 'Gestion de admin')
@endif

@section('scripts')



@endsection

@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/styleCursos.css')
@vite('resources/css/informacion.css')
@vite('resources/css/desactivarUsuario.css')
@vite('resources/js/BigBox.js')
@endsection

@section('content')

<div class="contenedorPrincipal">

    <!-- área de titulo  -->
    
    <div class="row align-items-center justify-content-center" style="width: 80%;">
    <div class="col-12">
        <label for="inputT" class="estiloTitulo">Titulo</label>
        <input type="text" class="form-control inputTitulo" id="inputT" style="width: 100%;"/>
    </div>
</div>

<!-- área de archivo -->
<div class="row align-items-center justify-content-center" style="width: 80%;">
    <div class="col-4">

    <div class="botonArchivo botonNoticia">
        <a href="#">
            <button>
                <p>Subir un archivo</p>
            </button>
        </a>                
    </div>

    </div>

    <div class="col-8">
    <input type="text" class="form-control inputTitulo" id="inputT" style="width: 100%;"/>
    </div>

</div>

<!-- editor de texto BigBox -->
<div class="row align-items-center justify-content-center" style="width: 80%;">
    <div class="col-12">
        <div id="editor" style="height: 100px;">
        </div>
    </div>
</div>



<!-- boton para crear noticia -->

<div class="row align-items-center justify-content-center" style="width: 25%;">
    <div class="col-12">

    <div class="botonArchivo botonNoticia ">
        <a href="#">
            <button>
                <p>Crear noticia</p>
            </button>
        </a>                
    </div>

    </div>

</div>

</div>

@endsection