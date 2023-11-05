@extends('Layouts.app')
@section('title', 'Gestion de codigos')
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

@endsection
@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite('resources/css/gestion-categorias.css')
    @vite('resources/js/modulo-gestion-codigos/codigos-admin.js')
@endsection
@section('content')

<!------------------------------------- BARRA DE NAVEGACION ------------------------------------->
    <div class="cuerpoGestion">
        <div class="BuscaYCrea"> <!-- Buscador y boton de crear -->

            <input type="text" class="buscarInput" placeholder="Buscar" id="inputBusqueda"/>

            <button class="crearBoton" type="button" id="creaCodigos">
                Nueva codigo
            </button>
        </div>

        <div id="containerListaCodigos">
            
        </div>

        
    </div>
@endsection
