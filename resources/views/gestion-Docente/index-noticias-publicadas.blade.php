@extends('Layouts.appDocente')

@section('title', 'Gestion Docente')

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@vite('resources/js/modulo-gestion-docente/listarNoticiasDocente.js')
@endsection

@section('css')
@vite('resources/css/styleUsuariosAdmin.css')
@vite('resources/css/index-usuarios.css')
@vite('resources/css/styleCursos.css')
<!--@vite('resources/js/crearUsuarioAdmin.js')-->
<!--@vite('resources/css/informacion.css')-->
@endsection

@section('content')

<div class="contenedorPrincipal">

<!-- area de busqueda -->
<div class="contenedorBusqueda">
    <div class="InputBuscar">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Buscar..." />
    </div>
</div>

<!-- contenedor de cursos-->
<!-- contenedor de cursos-->
<div id="container-noticias">

</div>

<!-- Modal mas informacion-->
<div class="modal fade" id="modalMasInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Encabezado de el modal -->
            <div class="modal-header">
                <h5 class="modal-title h4" id="exampleModalXlLabel">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"></font>
                    </font>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerca">X</button>
            </div>
            <!-- cuerpo de el modal -->
            <div class="modal-body">

                <!-- Encabezado -->
                <div class="row">
                    <div class="col-12 fuente-encabezado">
                        <p id="txtEncabezadoNoticia">H</p>
                    </div>
                </div>

                <!-- banner -->
                <div class="row">
                    <div class="col-12">
                        <img class="imagen-banner" id="imgNoticia" src="{{ asset('images/Rectangle 56.png') }}">
                    </div>
                </div>

                <!-- contenido de la noticia -->
                <div class="row">
                    <div class="col-12 contenido-noticia" id="cuerpoDeNoticia">
                    </div>

                </div>

                <!-- botones de editar y eliminar -->
                <div class="row mt-5">
                    <div class="col-12 align-items-center justify-content-center d-flex">
                        <button class="btn-editar-noticia" data-bs-toggle="modal" data-bs-target="#modalEditar" id="btnEditarNoticia">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M19.3 8.925L15.05 4.725L16.45 3.325C16.8333 2.94167 17.3043 2.75 17.863 2.75C18.4217 2.75 18.8923 2.94167 19.275 3.325L20.675 4.725C21.0583 5.10833 21.2583 5.571 21.275 6.113C21.2917 6.655 21.1083 7.11733 20.725 7.5L19.3 8.925ZM17.85 10.4L7.25 21H3V16.75L13.6 6.15L17.85 10.4Z"
                                    fill="white" />
                            </svg>
                            <p>Editar</p>
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal eliminar-->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel12" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Encabezado de el modal -->
            <div class="modal-header">
                <h5 class="modal-title h4" id="exampleModalXlLabel">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"></font>
                    </font>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerca">X</button>
            </div>

            <!-- cuerpo de el modal -->
            <div class="modal-body">
                <!-- imagen -->
                <div class="row">
                    <div class="col-12 align-items-center justify-content-center d-flex">
                        <svg class="img-eliminar-noticia" xmlns="http://www.w3.org/2000/svg" width="240"
                            height="203" viewBox="0 0 240 203" fill="none">

                            <path
                                d="M135.263 9.28381L236.713 176.893C238.26 179.449 239.074 182.348 239.074 185.299C239.074 188.251 238.26 191.15 236.713 193.706C235.166 196.261 232.941 198.384 230.262 199.859C227.582 201.335 224.543 202.112 221.449 202.112H18.5503C15.4565 202.112 12.4173 201.335 9.73799 199.859C7.05871 198.384 4.83383 196.261 3.28697 193.706C1.74011 191.15 0.925762 188.251 0.925781 185.299C0.925801 182.348 1.74018 179.449 3.28708 176.893L104.737 9.28381C111.516 -1.92452 128.472 -1.92452 135.263 9.28381ZM120 28.8984L28.7258 179.695H211.274L120 28.8984ZM120 142.125C123.116 142.125 126.105 143.306 128.308 145.408C130.512 147.51 131.75 150.361 131.75 153.333C131.75 156.306 130.512 159.157 128.308 161.259C126.105 163.361 123.116 164.542 120 164.542C116.884 164.542 113.895 163.361 111.691 161.259C109.488 159.157 108.25 156.306 108.25 153.333C108.25 150.361 109.488 147.51 111.691 145.408C113.895 143.306 116.884 142.125 120 142.125ZM120 63.6666C123.116 63.6666 126.105 64.8475 128.308 66.9495C130.512 69.0515 131.75 71.9023 131.75 74.875V119.708C131.75 122.681 130.512 125.532 128.308 127.634C126.105 129.736 123.116 130.917 120 130.917C116.884 130.917 113.895 129.736 111.691 127.634C109.488 125.532 108.25 122.681 108.25 119.708V74.875C108.25 71.9023 109.488 69.0515 111.691 66.9495C113.895 64.8475 116.884 63.6666 120 63.6666Z"
                                fill="#D30A0A" />
                        </svg>

                    </div>
                </div>

                <!-- texto -->
                <div class="row">
                    <div class="col-12 texto-eliminar-noticia mt-5">
                        <p>Estas seguro de Eliminar la noticia?</p>
                    </div>
                </div>

                <!-- botones de editar y eliminar -->
                <div class="row mt-5">
                    <div class="col-6 align-items-center justify-content-center d-flex">
                        <button class="btn-cancelar-noticia btn-close" data-bs-dismiss="modal"
                            aria-label="Cancelar">
                            <p>Cancelar</p>
                        </button>
                    </div>

                    <div class="col-6 align-items-center justify-content-center d-flex">
                        <button class="btn-eliminar-noticia-modal" id="btnEliminarNoticia">
                            <p>Eliminar</p>
                        </button>
                    </div>
                </div>

            </div>



        </div>
    </div>
</div>

<!-- modal editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel12" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Contenido del modal -->
            <!-- Encabezado de el modal -->
            <div class="modal-header">
                <h5 class="modal-title h4" id="exampleModalXlLabel">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"></font>
                    </font>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerca">X</button>
            </div>

            <!-- cuerpo de el modal -->
            <div class="modal-body">

                <div class="contenedorPrincipal">

                    <!-- área de titulo -->

                    <div class="row align-items-center justify-content-center" style="width: 80%;">
                        <div class="col-12">
                            <label for="inputT" class="estiloTitulo">Titulo</label>
                            <input type="text" class="form-control inputTitulo" id="inputT"
                                style="width: 100%;" />
                        </div>
                    </div>

                    <!-- área de archivo -->
                    <div class="row align-items-center justify-content-center" style="width: 80%;">
                        <button class="botonArchivo botonNoticia col-4" id="botonSubir">
                            Subir imagen de portada
                        </button>
                        <input type="file" id="imageInput" accept="image/*" style="display: none;">
                        <div class="col-8">
                            <input type="text" class="form-control inputTitulo" id="filename" style="width: 100%;" disabled/>
                        </div>
                    </div>

                    <!-- editor de texto BigBox -->
                    <div class="row align-items-center justify-content-center" style="width: 80%;">
                        <div class="col-12">
                            <textarea id="contentDescripcion" name="content" class="form-control"></textarea>
                        </div>
                    </div>

                    <!-- botones para cancelar y guardar cambios -->

                    <div class="row mt-5 w-100">
                        <div class="col-6 align-items-center justify-content-center d-flex">
                            <button class="btn-cancelar-noticia-edicion btn-close" data-bs-dismiss="modal"
                                aria-label="Cancelar">
                                <p>Cancelar</p>
                            </button>
                        </div>

                        <div class="col-6 align-items-center justify-content-center d-flex">
                            <button class="btn-guardar-cambios" id="btnActualizarNoticia">
                                <p>Guardar cambios</p>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


@endsection