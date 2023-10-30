@extends('Layouts.app')
@section('title', 'Gestion de categorias')
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

@endsection
@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite('resources/css/gestion-categorias.css')
@endsection
@section('content')

<!------------------------------------- BARRA DE NAVEGACION ------------------------------------->
    <div class="cuerpoGestion">
        <div class="BuscaYCrea"> <!-- Buscador y boton de crear -->

            <input type="text" class="buscarInput" placeholder="Buscar" />

            <button class="crearBoton" type="button" data-bs-toggle="modal" data-bs-target="#creaCategoria">
                Nueva categoria
            </button>
        </div>


        <div class="container text-center contenedorCurso"> <!-- Contenedor de cursos -->

            <div class="row">
                <div class="col-8 letraCurso text-start">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae quibusdam illum quisquam eos, doloribus expedita nam nihil quae cupiditate, libero cum officiis odit corporis. Voluptate voluptatibus odit ipsum aut veniam!</p>
                </div>
                <div class="col-4 d-grid gap-2 d-md-flex justify-content-md-end container"> <!-- Botones de editar y eliminar -->
                    <button type="button" class="btn btn-light botonesCurso letrabtnEditar" data-bs-toggle="modal"
                        data-bs-target="#editarCategoria">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                            fill="none">
                            <path
                                d="M19.3 9.425L15.05 5.225L16.45 3.825C16.8333 3.44167 17.3043 3.25 17.863 3.25C18.4217 3.25 18.8923 3.44167 19.275 3.825L20.675 5.225C21.0583 5.60833 21.2583 6.071 21.275 6.613C21.2917 7.155 21.1083 7.61733 20.725 8L19.3 9.425ZM17.85 10.9L7.25 21.5H3V17.25L13.6 6.65L17.85 10.9Z"
                                fill="#1E6DA6" />
                        </svg>
                        <p class="letraBoton" style="padding-top: 10%">Editar</p>
                    </button>
                    <button type="button" class="btn btn-light botonesCurso letrabtnEliminar" data-bs-toggle="modal" data-bs-target="#eliminarCategoria">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                            fill="none">
                            <path
                                d="M7 21.5C6.45 21.5 5.979 21.304 5.587 20.912C5.195 20.52 4.99933 20.0493 5 19.5V6.5H4V4.5H9V3.5H15V4.5H20V6.5H19V19.5C19 20.05 18.804 20.521 18.412 20.913C18.02 21.305 17.5493 21.5007 17 21.5H7ZM9 17.5H11V8.5H9V17.5ZM13 17.5H15V8.5H13V17.5Z"
                                fill="#FF0000" />
                        </svg>
                        <p class="letraBoton" style="padding-top: 10%">Eliminar</p>
                    </button>
                </div>
            </div>
        </div>

        <div class="modal right" id="creaCategoria" tabindex="-1" aria-labelledby="modal-creaCategorialLabel"
            aria-hidden="true"> <!-- Modal de crear categoria -->
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content ">
                    <div class="modal-body">
                        <div class="container" style="margin-top: 20%">
                            <div class="d-flex flex-column align-items-start">
                                <h5 class="letraCategoria ">Nombre categoría</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control label-simple" placeholder="Nombre"
                                        aria-label="Username" aria-describedby="basic-addon1">
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
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        Crear categoría
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

        <div class="modal right" id="editarCategoria" tabindex="-1" aria-labelledby="modal-editarCategorialLabel"
            aria-hidden="true"> <!-- Modal de editar categoria -->
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content ">
                    <div class="modal-body">
                        <div class="container" style="margin-top: 20%">
                            <div class="d-flex flex-column align-items-start">
                                <h5 class="letraCategoria ">Nombre categoría</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control label-simple" placeholder="Nombre"
                                        aria-label="Username" aria-describedby="basic-addon1">
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
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        Editar categoría
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

        <div class="modal right" id="eliminarCategoria" tabindex="-1" aria-labelledby="modal-eliminaCategorialLabel"
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
                            <p class="letraEliminar">¿Estas seguro de eliminar la categoría?</p>
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
                                                        data-bs-dismiss="modal" aria-label="Close">
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
    </div>
@endsection
