@extends('Layouts.app')
@section('title', 'Gestion de docentes')
@section('scripts')
    <!-- Inicio Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- Fin Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/informacion.css')
@vite('resources/css/desactivarUsuario.css')
@vite('resources/js/modulo-gestion-usuarios/docentes-admin.js')
@endsection
@section('content')
<div class="cuerpoGestion">
    <div class="botonesFiltro">
        <a class="botonFiltroActivo" href="{{route('app_index_docentes')}}">
            <button>
                <p class="botonFiltro">Docentes</p>
            </button>
        </a>
        <a class="botonFiltroDesactivo" href="{{route('app_index_estudiantes')}}">
            <button>
                <p class="botonFiltro">Estudiantes</p>
            </button>
        </a>
    </div>
    <div class="BuscaYCrea">

        <input type="text" class="buscarInput" placeholder="Buscar" id="inputBusqueda"/>

        <button class="crearBoton" data-bs-toggle="modal" data-bs-target="#modal-CrearUsuario">
            <p class="crearBoton1">Nuevo docente</p>
        </button>
    </div>

    <div id="contenedorDocentes">
    </div>
</div>
</div>

<!-- Modal para crear usuario -->
<div class="modal right" id="modal-CrearUsuario" tabindex="-1" aria-labelledby="modal-CrearUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content ">
            <div class="container">
                <form class="formulario-CrearUsuarioAdmin needs-validation">
                    <div class="input-container">
                        <label for="email">Correo Electrónico</label>
                        <input class="borde" type="email" id="emailDocente" name="email" required>
                    </div>
                    <div class="input-container">
                        <label for="password">Contraseña</label>
                        <input type="password" id="passwordDocente" name="password" required>
                    </div>
                    <div class="button-container">
                        <button type="button" class="btn-Cancelar button-common" data-bs-dismiss="modal" aria-label="Close" id="btn">Cancelar</button>
                        <button type="button" class="btn-Crear button-common" data-bs-dismiss="modal" aria-label="Close" id="btnCrearDocente">Crear</button>
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
                <div class="d-flex justify-content-center align-items-center">
                    <img src="" id="img_docente" alt="Usuario" class="img-fluid rounded-circle rounded-image">
                </div>
                <h5 class="text-center mt-3 modal-title" id="nombre_docente"></h5>
                <br>
                <p class="text-center text-white" id="estado_docente"></p>
                <br>
                <p class="text-center text-white" id="especialidad_docente"></p>
                <br>
                <p class="text-center text-white" id="correo_docente"></p>
                <br>
                <p class="text-center text-white" id="descripcion_docente"></p>
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
                    <img src="{{ asset('images/Ellipse_10.png') }}" alt="Usuario" class="img-fluid rounded-circle rounded-image">
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control label-simple" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" id="inputNombreDocente"/>
                                        <select id="especialidadDocenteSelector" class="form-select" aria-label="Default select example">
                                        </select>
                                    </div>
                                </td>
                            </tr>
           
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control label-descripcion" placeholder="Descripcion" aria-label="With textarea" id="inputDescripcionDocente"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary btn-cancel" data-bs-dismiss="modal" aria-label="Close">
                                            Cancelar
                                        </button>
                                        <button type="button" class="btn btn-primary btn-save ms-5" data-bs-dismiss="modal" aria-label="Close" id="btnEditarDocente">
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

<!--modal para desactivar Usuario-->
<div class="modal" id="modalconfirmacion" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title-delete"><i class="fas fa-exclamation-triangle text-danger"></i> Confirmación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas desactivar al docente/estudiante?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-Cancelar button-common" data-bs-dismiss="modal" aria-label="Close" id="btn">Cancelar</button>
                <button type="button" class="btn-Eliminar button-common" data-bs-dismiss="modal" aria-label="Close" id="btnDesactivarDocente">Desactivar</button>
            </div>
        </div>
    </div>
</div>
@endsection
