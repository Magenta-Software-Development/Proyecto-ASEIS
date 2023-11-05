@extends('Layouts.app')
@section('title', 'Gestion de especialidades')
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

@endsection
@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite('resources/css/gestion-categorias.css')
    @vite('resources/js/modulo-gestion-especialidades/especialidades-admin.js')
@endsection
@section('content')

<!------------------------------------- BARRA DE NAVEGACION ------------------------------------->
    <div class="cuerpoGestion">
        <div class="BuscaYCrea"> <!-- Buscador y boton de crear -->

            <input type="text" class="buscarInput" placeholder="Buscar"  id="inputBusqueda"/>

            <button class="crearBoton" type="button" data-bs-toggle="modal" data-bs-target="#creaEspecialidad">
                Nueva especialidad
            </button>
        </div>

        <div id="containerListaEspecialidades">
            
        </div>

        <div class="modal right" id="creaEspecialidad" tabindex="-1" aria-labelledby="modal-creaCategorialLabel"
            aria-hidden="true"> <!-- Modal de crear categoria -->
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content ">
                    <div class="modal-body">
                        <div class="container" style="margin-top: 20%">
                            <div class="d-flex flex-column align-items-start">
                                <h5 class="letraCategoria ">Nombre de especialidad</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control label-simple" placeholder="Nombre"
                                        aria-label="Username" aria-describedby="basic-addon1" id="inputCrearEspecialidad-Nombre">
                                </div>
                            </div>
                            <br><br>
                            <div class="table-responsive"> <!-- Tabla de crear categoria -->
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" colspan="2">
                                                <div class="d-flex justify-content-center">
                                                    <button type="button" class="btn btn-secondary btn-cancel"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        Cancelar
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-save ms-5"
                                                        data-bs-dismiss="modal" aria-label="Close" id="btnCrearEspecialidad">
                                                        Crear especialidades
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
        </div>

        <div class="modal right" id="editarEspecialidad" tabindex="-1" aria-labelledby="modal-editarCategorialLabel"
            aria-hidden="true"> <!-- Modal de editar categoria -->
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content ">
                    <div class="modal-body">
                        <div class="container" style="margin-top: 20%">
                            <div class="d-flex flex-column align-items-start">
                                <h5 class="letraCategoria ">Nombre especialidad</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control label-simple" placeholder="Nombre"
                                        aria-label="Username" aria-describedby="basic-addon1" id="inputEditarEspecialidadNombre">
                                </div>
                            </div>
                            <br><br>
                            <div class="table-responsive"> <!-- Tabla de editar categoria -->
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" colspan="2">
                                                <div class="d-flex justify-content-center">
                                                    <button type="button" class="btn btn-secondary btn-cancel"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        Cancelar
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-save ms-5"
                                                        data-bs-dismiss="modal" aria-label="Close" id="btnEditarEspecialidad">
                                                        Editar especialidad
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
        </div>

        <div class="modal right" id="eliminarEspecialidad" tabindex="-1" aria-labelledby="modal-eliminaCategorialLabel"
            aria-hidden="true"> <!-- Modal de eliminar categoria -->
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content ">
                    <div class="modal-body">
                        <div class="container" style="margin-top: 5%">
                            <div class="d-flex flex-column align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="240" height="203" viewBox="0 0 240 203" fill="none">
                                    <path d="M135.263 9.28369L236.713 176.893C238.26 179.449 239.074 182.348 239.074 185.299C239.074 188.25 238.26 191.15 236.713 193.705C235.166 196.261 232.941 198.384 230.262 199.859C227.582 201.335 224.543 202.112 221.449 202.112H18.5503C15.4565 202.112 12.4173 201.335 9.73799 199.859C7.05871 198.384 4.83383 196.261 3.28697 193.705C1.74011 191.15 0.925762 188.25 0.925781 185.299C0.925801 182.348 1.74018 179.449 3.28708 176.893L104.737 9.28369C111.516 -1.92464 128.472 -1.92464 135.263 9.28369ZM120 28.8983L28.7258 179.695H211.274L120 28.8983ZM120 142.125C123.116 142.125 126.105 143.306 128.308 145.408C130.512 147.51 131.75 150.361 131.75 153.333C131.75 156.306 130.512 159.157 128.308 161.259C126.105 163.361 123.116 164.542 120 164.542C116.884 164.542 113.895 163.361 111.691 161.259C109.488 159.157 108.25 156.306 108.25 153.333C108.25 150.361 109.488 147.51 111.691 145.408C113.895 143.306 116.884 142.125 120 142.125ZM120 63.6665C123.116 63.6665 126.105 64.8474 128.308 66.9494C130.512 69.0513 131.75 71.9022 131.75 74.8749V119.708C131.75 122.681 130.512 125.532 128.308 127.634C126.105 129.736 123.116 130.917 120 130.917C116.884 130.917 113.895 129.736 111.691 127.634C109.488 125.532 108.25 122.681 108.25 119.708V74.8749C108.25 71.9022 109.488 69.0513 111.691 66.9494C113.895 64.8474 116.884 63.6665 120 63.6665Z" fill="#D30A0A"/>
                                </svg>
                                    
                            <br>
                            <p class="letraEliminar">¿Estas seguro de desactivar la especialidad?</p>
                        </div>
                            <br>
                            <div class="table-responsive"> <!-- Tabla de eliminar categoria -->
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" colspan="2">
                                                <div class="d-flex justify-content-center">
                                                    <button type="button" class="btn btn-secondary btn-cancel"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        Cancelar
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-eliminar ms-5"
                                                        data-bs-dismiss="modal" aria-label="Close" id="btnDesactivarEspecialidad">
                                                        Eliminar
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
        </div>

        <div class="modal right" id="activarEspecialidad" tabindex="-1" aria-labelledby="modal-eliminaCategorialLabel"
            aria-hidden="true"> <!-- Modal de eliminar categoria -->
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content ">
                    <div class="modal-body">
                        <div class="container" style="margin-top: 5%">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fa-solid fa-circle-check fa-2xl" id="iconActivar"></i>                    
                            <br>
                            <p class="letraEliminar" style="padding-top: 20%">¿Estas seguro de activar la especialidad?</p>
                        </div>
                            <br>
                            <div class="table-responsive"> <!-- Tabla de eliminar categoria -->
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" colspan="2">
                                                <div class="d-flex justify-content-center">
                                                    <button type="button" class="btn btn-secondary btn-cancel"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        Cancelar
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-activar ms-5"
                                                        data-bs-dismiss="modal" aria-label="Close" id="btnActivarEspecialidad">
                                                        Activar
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
        </div>
    </div>
@endsection
