
@extends('Layouts.app')
    @section('title', 'Mostrar información')
    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @endsection
@section('content')
    <!-- Botones para abrir modales -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-Docente">
        Ver Mas
    </button>

    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-DocenteE">
        Editar
    </button>

    <!-- Modal para ver información de usuario -->
    <div class="modal right" id="modal-Docente" tabindex="-1" aria-labelledby="modal-DocentelLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-gestion">
                <div class="modal-body">
                    <!-- Botón de retroceso -->
                    <button type="button" class="btn btn-back btn-back2" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71"
                            fill="none">
                            <path
                                d="M51.8001 11.4488L46.5343 6.21252L17.2764 35.5L46.5639 64.7875L51.8001 59.5513L27.7489 35.5L51.8001 11.4488Z"
                                fill="white" />
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
    <div class="modal right" id="modal-DocenteE" tabindex="-1" aria-labelledby="modal-DocenteElLabel"
        aria-hidden="true">
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
                                            <input type="text" class="form-control label-simple" placeholder="Nombre"
                                                aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control label-simple" placeholder="Profesion"
                                            aria-label="Profesion" aria-describedby="basic-addon1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control label-simple"
                                            placeholder="Especialidad" aria-label="Especialidad"
                                            aria-describedby="basic-addon1">
                                    </td>
                                    <td>
                                        <textarea class="form-control label-descripcion" placeholder="Descripcion" aria-label="With textarea"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary btn-cancel"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                Cancelar
                                            </button>
                                            <button type="button" class="btn btn-primary btn-save ms-5"
                                                data-bs-dismiss="modal" aria-label="Close">
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

    
    


