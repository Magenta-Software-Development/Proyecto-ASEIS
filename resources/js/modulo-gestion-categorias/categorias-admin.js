//funcion para crear alertas personalizadas estilos sweet.
function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    })
}
async function cargarDatos(id) {
    try {
        let categoria = await getInfoCategoria(id);
        console.log(categoria);
        $("#inputEditarCategoriaNombre").val(categoria.categoria.nombre);
        return categoria; // Devolviendo el docente para su posterior uso a la hora de actualizar
    } catch (error) {
        console.error(error);
        throw error;
    }
}
function desactivarCategoria(id){
    $("#btnDesactivarCategoria").click(function () { 
        console.log("presionando para desactivar la categoria con ID: ",id)
        $.ajax({
            type: "PUT",
            url: "https://springgcp-402821.uc.r.appspot.com/api/categoria/desactivarCategoria/" + id, 
            contentType: "application/json",
            crossDomain: true,
            success: function(response, textStatus, xhr) {
                sweetalert('success','Usuario desactivado', response.message);
                listarCategorias();
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error(errorThrown);
            }
        });
    })
}
async function getInfoCategoria(id) {
    try {
        const response = await $.ajax({
            type: "GET",
            url: "https://springgcp-402821.uc.r.appspot.com/api/categoria/obtenerCategoria/" + id,
            contentType: "application/json",
            crossDomain: true
        });
        return response;
    } catch (error) {
        throw error;
    }
}
async function editarCategoria(id){
    //const categoriaTemp = await cargarDatos(id);
    $("#editarCategoria").modal("show");
    $("#btnEditarCategoria").click(function () { 
        if($.trim($("#inputEditarCategoriaNombre").val()) !== ''){
            let data = {
                id_categoria: id,
                categoria: $("#inputEditarCategoriaNombre").val(),
                estado: true
            }
            $("#inputEditarCategoriaNombre").val("");
            $.ajax({
                url: 'https://springgcp-402821.uc.r.appspot.com/api/categoria/actualizarCategoria', 
                type: 'PUT', 
                contentType: "application/json",
                crossDomain: true,
                data: JSON.stringify(data), 
                success: function(response, textStatus, xhr) {
                    // Si la solicitud fue exitosa aca...
                    sweetalert('success','Actualizado con exito!',response.message);
                    listarCategorias();
                },
                error: function(error) {
                    // Ocurrió un error en la solicitud, no encontro correo...
                    //dentro del objeto error se encuentra el mensaje de eror y codigo de estado...
                    if (error.status == 500) {
                        sweetalert('error',"Ocurrio un error",error.responseJSON.message);
                    }
                }
            });
        }
    });
}

function crearListaCategoria(categorias){
    const contenedorListaCategorias = document.getElementById("containerListaCategoria");
    $("#containerListaCategoria").empty();
    contenedorListaCategorias.style.marginTop = "25px";
    //console.log(categorias);
    categorias.forEach(categoria => {
        //console.log(categoria);
        if(categoria.estado){
            const nuevoCategoriaDiv = document.createElement("div");
            nuevoCategoriaDiv.className = "container text-center contenedorCurso";
            nuevoCategoriaDiv.style.marginTop = "6px";
            nuevoCategoriaDiv .innerHTML = '';
            nuevoCategoriaDiv.innerHTML = `
            <div class="row">
            <div class="col-8 letraCurso text-start">
                <p>${categoria.categoria}</p>
            </div>
            <div class="col-4 d-grid gap-2 d-md-flex justify-content-md-end container"> <!-- Botones de editar y eliminar -->
                <button type="button" class="btn btn-light botonesCurso letrabtnEditar btnEditarCategoria" data-bs-toggle="modal"
                    data-bs-target="#editarCategoria" data-id-categoria="${categoria.id_categoria}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                        fill="none">
                        <path
                            d="M19.3 9.425L15.05 5.225L16.45 3.825C16.8333 3.44167 17.3043 3.25 17.863 3.25C18.4217 3.25 18.8923 3.44167 19.275 3.825L20.675 5.225C21.0583 5.60833 21.2583 6.071 21.275 6.613C21.2917 7.155 21.1083 7.61733 20.725 8L19.3 9.425ZM17.85 10.9L7.25 21.5H3V17.25L13.6 6.65L17.85 10.9Z"
                            fill="#1E6DA6" />
                    </svg>
                    <p class="letraBoton" style="padding-top: 10%">Editar</p>
                </button>
                <button type="button" class="btn btn-light botonesCurso letrabtnEliminar btnEliminarCategoria" data-bs-toggle="modal" data-bs-target="#eliminarCategoria" data-id-categoria="${categoria.id_categoria}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                        fill="none">
                        <path
                            d="M7 21.5C6.45 21.5 5.979 21.304 5.587 20.912C5.195 20.52 4.99933 20.0493 5 19.5V6.5H4V4.5H9V3.5H15V4.5H20V6.5H19V19.5C19 20.05 18.804 20.521 18.412 20.913C18.02 21.305 17.5493 21.5007 17 21.5H7ZM9 17.5H11V8.5H9V17.5ZM13 17.5H15V8.5H13V17.5Z"
                            fill="#FF0000" />
                    </svg>
                    <p class="letraBoton" style="padding-top: 10%">Desactivar</p>
                </button>
            </div>
        </div>
        `;
        contenedorListaCategorias.appendChild(nuevoCategoriaDiv);
        }
    });

    const btnEditar = document.querySelectorAll(".btnEditarCategoria");
    btnEditar.forEach(boton => {
        boton.addEventListener("click", function() {
            const idCategoria = boton.dataset.idCategoria;
            editarCategoria(idCategoria);
        });
    });

    const btnDelete = document.querySelectorAll(".btnEliminarCategoria");
    btnDelete.forEach(boton => {
        boton.addEventListener("click", function() {
            const idCategoria = boton.dataset.idCategoria;
            desactivarCategoria(idCategoria);
        });
    });
}
function listarCategorias(){
    $.ajax({
        type: "GET",
        url: "https://springgcp-402821.uc.r.appspot.com/api/categoria/obtenerCategorias", 
        contentType: "application/json",
        crossDomain: true,
        success: function(response, textStatus, xhr) {
            crearListaCategoria(response);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}
$('#btnCrearCategoria').click(function() {
    // Obtengo el valor del correo electrónico del input
    if($.trim($("#inputCrearCategoria-Nombre").val()) !== ''){
        var data = {
            categoria: $("#inputCrearCategoria-Nombre").val(),
            estado: true
        };
        console.log(JSON.stringify(data));
        // Realizamos una solicitud AJAX utilizando jQuery
        $.ajax({
            url: 'https://springgcp-402821.uc.r.appspot.com/api/categoria/nuevaCategoria', 
            type: 'POST', 
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(data), 
            success: function(response, textStatus, xhr) {
                console.log(response);
                // Si la solicitud fue exitosa aca...
                if(xhr.status == 201){//Se encuentra el correo del usuario, con rol invitado, procedemos a activar su cuenta
                    sweetalert('success','Creada con exito!',response.message);
                    listarCategorias();
                }
            },
            error: function(error) {
                // Ocurrió un error en la solicitud, no encontro correo...
                //dentro del objeto error se encuentra el mensaje de eror y codigo de estado...
                console.log(error);
                if (error.status == 500) {
                    sweetalert('error',"Categoria Existente",error.responseJSON.message);
                }
            }
        });
    } // fin del condicional para evaluar que los datos esten bien, antes de enviar peticion a la API.
});

$(document).ready(function () {
    listarCategorias();
});