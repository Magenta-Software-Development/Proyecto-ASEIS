@extends('Layouts.app')
@section('title', 'Gestion de docentes')
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@endsection
@section('css')
@vite('resources/css/crearUsuarioAdminStyle.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/js/crearUsuarioAdmin.js')
@endsection
@section('content')
<div class="cuerpoGestion">
    <div class="botonesFiltro">
        <a href="{{route('app_index_usuarios')}}">
            <button class="botonFiltroActivo">
                <p class="botonFiltro">Docentes</p>
            </button>
        </a>
        <a href="{{route('app_index_estudiante')}}">
            <button class="botonFiltroDesactivo">
                <p class="botonFiltro">Estudiantes</p>
            </button>
        </a>
    </div>
    <div class="BuscaYCrea">
        <div>
            <input type="text" class="buscarInput" placeholder="Buscar" />
        </div>
        <button class="crearBoton" data-bs-toggle="modal" data-bs-target="#modal-CrearUsuario">
            <p class="crearBoton1">Nuevo docente</p>
        </button>
    </div>

    <div class="cuerpoUsuarios">
        <div class="imagenUsuario"></div>
        <div class="nombreDocenteBox">
            <p class="DocenteNombreTxt">
                Héctor Javier Paiz Ramos
            </p>
            <p class="DocenteDescripcionTxt">Docente</p>
        </div>
        <button class="BotonEdit" data-bs-toggle="modal" data-bs-target="#modal-DocenteE">
            <div class="BotonEditSymbol">
                <svg width="100%" height="100%" preserve-aspect-ratio="none" view-box="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 19.3 8.925 L 15.05 4.725 L 16.45 3.325 C 16.833 2.942 17.304 2.75 17.863 2.75 C 18.422 2.75 18.892 2.942 19.275 3.325 L 20.675 4.725 C 21.058 5.108 21.258 5.571 21.275 6.113 C 21.292 6.655 21.108 7.117 20.725 7.5 L 19.3 8.925 Z M 17.85 10.4 L 7.25 21 H 3 V 16.75 L 13.6 6.15 L 17.85 10.4 Z" fill="#1E6DA6" />
                </svg>
            </div>
            <p class="BotonEditarText">Editar</p>
        </button>
        <button class="BotonVerMas" data-bs-toggle="modal" data-bs-target="#modal-Docente">
            <div class="BotonEditSymbol">
                <svg width="100%" height="100%" preserve-aspect-ratio="none" view-box="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 6.75 7.5 C 6.75 8.892 7.303 10.228 8.288 11.212 C 9.272 12.197 10.608 12.75 12 12.75 C 13.392 12.75 14.728 12.197 15.712 11.212 C 16.697 10.228 17.25 8.892 17.25 7.5 C 17.25 6.108 16.697 4.772 15.712 3.788 C 14.728 2.803 13.392 2.25 12 2.25 C 10.608 2.25 9.272 2.803 8.288 3.788 C 7.303 4.772 6.75 6.108 6.75 7.5 Z M 19.5 21.75 H 3.75 C 3.551 21.75 3.36 21.671 3.22 21.53 C 3.079 21.39 3 21.199 3 21 V 18.75 C 3 17.755 3.395 16.802 4.098 16.098 C 4.802 15.395 5.755 15 6.75 15 H 17.25 C 18.245 15 19.198 15.395 19.902 16.098 C 20.605 16.802 21 17.755 21 18.75 V 21 C 21 21.199 20.921 21.39 20.78 21.53 C 20.64 21.671 20.449 21.75 20.25 21.75 H 19.5 Z" fill="#1E6DA6" />
                </svg>
            </div>
            <p class="BotonVerMasText">Ver más</p>
        </button>
    </div>
</div>

<!-- Modal para crear usuario -->
<div class="modal right" id="modal-CrearUsuario" tabindex="-1" aria-labelledby="modal-CrearUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-body">
            <div class="container">
                <form class="formulario-CrearUsuarioAdmin">
                    <div class="input-container">
                        <label for="email">Correo Electrónico</label>
                        <input class="borde" type="email" id="email" name="email" required>
                    </div>
                    <div class="input-container">
                        <label for="password">Contraseña</label>
                        <input type="password" id="passworddd" name="password" required>
                    </div>
                    <div class="button-container">
                        <button type="button" class="btn-Cancelar button-common" id="btnCancelar">Cancelar</button>
                        <button type="button" class="btn-Crear button-common" id="btnCrear">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para ver información de usuario -->
<div class="modal right" id="modal-Docente" tabindex="-1" aria-labelledby="modal-DocentelLabel" aria-hidden="true">
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
                    <img src="images/Ellipse_10.png" alt="Usuario" class="img-fluid rounded-circle rounded-image">
                </div>
                <h5 class="text-center mt-3 modal-title">Héctor Javier Paiz Ramos</h5>
                <br>
                <p class="text-center text-white">Especialidad: BackEnd</p>
                <br>
                <p class="text-center text-white">hector.paiz@ues.edu.sv</p>
                <br>
                <p class="text-center text-white">Descripción: Especialista en desarrollo de aplicaciones
                    aplicaciones en Android</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar información de usuario -->
<div class="modal right" id="modal-DocenteE" tabindex="-1" aria-labelledby="modal-DocenteElLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content ">
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center ">
                    <img src="images/Ellipse_10.png" alt="Usuario" class="img-fluid rounded-circle rounded-image">
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control label-simple" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control label-simple" placeholder="Profesion" aria-label="Profesion" aria-describedby="basic-addon1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control label-simple" placeholder="Especialidad" aria-label="Especialidad" aria-describedby="basic-addon1">
                                </td>
                                <td>
                                    <textarea class="form-control label-descripcion" placeholder="Descripcion" aria-label="With textarea"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary btn-cancel" data-bs-dismiss="modal" aria-label="Close">
                                            Cancelar
                                        </button>
                                        <button type="button" class="btn btn-primary btn-save ms-5" data-bs-dismiss="modal" aria-label="Close">
                                            Aceptar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection