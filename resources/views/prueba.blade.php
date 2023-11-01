@extends('Layouts.app')
@section('title', 'Gestion de estudiantes')
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@endsection
@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/js/crearUsuarioAdmin.js')
@vite('resources/css/informacion.css')
@vite('resources/css/desactivarUsuario.css')
@vite('resources/js/desactivarUsuario.js')
@endsection
@section('content')



<!-- Modal para ver información de usuario -->
<div class="modal right" id="modal-Estudiante" tabindex="-1" aria-labelledby="modal-DocentelLabel" aria-hidden="true" style="display: block">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-gestion">
            <div class="modal-body">
                <!-- Botón de retroceso -->
                <button type="button" class="btn btn-back btn-back2" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71" fill="none">
                        <path d="M51.8001 11.4488L46.5343 6.21252L17.2764 35.5L46.5639 64.7875L51.8001 59.5513L27.7489 35.5L51.8001 11.4488Z" fill="white" />
                    </svg>
                </button>
                <div class="d-flex justify-content-center align-items-center ">
                    <img src="{{ asset('images/Ellipse_10.png') }}" alt="Usuario" class="img-fluid rounded-circle rounded-image">
                </div>
                <h5 class="text-center mt-3 modal-title">Elian Francisco Treminio Parada</h5>
                <br>
                <p class="text-center text-white">Especialidad: Movil</p>
                <br>
                <p class="text-center text-white">Correo</p>
                <br>
                <p class="text-center text-white">Descripción</p>
            </div>
        </div>
    </div>
</div>


<div id="mensaje-exito" class="alert alert-success" style="display: none;">
    ¡Desactivado con éxito!
</div>

@endsection