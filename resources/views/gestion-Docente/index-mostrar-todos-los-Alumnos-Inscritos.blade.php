<!-- Inicio Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Fin Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"> <!--Fontawesome-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

@section('title', 'Gestion de admin')
@vite('resources/css/VerTodosLosAlumnos.css')
@vite('resources/js/modulo-gestion-docente/estudiantesInscritosCurso.js')


 <!-- Botón de retroceso -->
 <a href="{{ route('app_index_cursos_no_disponibles_docente') }}">
 <button type="button" class="btn btn-back">

    <svg xmlns="http://www.w3.org/2000/svg" width="69" height="69" viewBox="0 0 69 69" fill="none">
        <path d="M54.625 18.4287L50.5713 14.375L34.5 30.4463L18.4287 14.375L14.375 18.4287L30.4463 34.5L14.375 50.5713L18.4287 54.625L34.5 38.5537L50.5713 54.625L54.625 50.5713L38.5537 34.5L54.625 18.4287Z" fill="black"/>
        </svg>
</button>
 </a>
<div class="container tamanioContainer">

    <div id="containerUsuariosInscritos">
        
    </div>

    <!--
    <div class="container tarjeta">
        <div class="imagenUser"><img class="imagenUser" src="{{ asset('images/Ellipse_10.png') }}"></div>
        <div class="nombreDocenteBox">
            <p class="EstudianteNombreTxt">Elin Francisco Treminio Parada</p>
            <p class="EstudianteTxt">Estudiante</p>
        </div>
        <button class="BotonVerMas" data-id-docente="${usuario.id_docente}">
            <div class="BotonEditSymbol">
                <svg width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 6.75 7.5 C 6.75 8.892 7.303 10.228 8.288 11.212 C 9.272 12.197 10.608 12.75 12 12.75 C 13.392 12.75 14.728 12.197 15.712 11.212 C 16.697 10.228 17.25 8.892 17.25 7.5 C 17.25 6.108 16.697 4.772 15.712 3.788 C 14.728 2.803 13.392 2.25 12 2.25 C 10.608 2.25 9.272 2.803 8.288 3.788 C 7.303 4.772 6.75 6.108 6.75 7.5 Z M 19.5 21.75 H 3.75 C 3.551 21.75 3.36 21.671 3.22 21.53 C 3.079 21.39 3 21.199 3 21 V 18.75 C 3 17.755 3.395 16.802 4.098 16.098 C 4.802 15.395 5.755 15 6.75 15 H 17.25 C 18.245 15 19.198 15.395 19.902 16.098 C 20.605 16.802 21 17.755 21 18.75 V 21 C 21 21.199 20.921 21.39 20.78 21.53 C 20.64 21.671 20.449 21.75 20.25 21.75 H 19.5 Z" fill="#1E6DA6" />
                </svg>
            </div>
            <p class="BotonVerMasText">Ver más</p>
        </button>
    </div>
    <br>
    -->


    <!-- Modal para ver información de usuario -->
    <div class="modal right" id="modal-Estudiante" tabindex="-1" aria-labelledby="modal-DocentelLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-gestion">
                <div class="modal-body">
                    <!-- Botón de retroceso -->
                    <button type="button" class="btn btn-back btn-back2" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71" fill="none">
                            <path d="M51.8001 11.4488L46.5343 6.21252L17.2764 35.5L46.5639 64.7875L51.8001 59.5513L27.7489 35.5L51.8001 11.4488Z" fill="white" />
                        </svg>
                    </button>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="" id="img_estudiante" alt="Usuario" class="img-fluid rounded-circle rounded-image">
                    </div>
                    <h5 class="text-center mt-3 modal-title" id="nombre_estudiante"></h5>
                    <br>
                    <p class="text-center text-white" id="estado_estudiante"></p>
                    <br>
                    <p class="text-center text-white" id="especialidad_estudiante">Estudiante</p>
                    <br>
                    <p class="text-center text-white" id="correo_estudiante"></p>
                    <br>
                    <p class="text-center text-white" id="descripcion_estudiante"></p>
                </div>
            </div>
    </div>


</div>





