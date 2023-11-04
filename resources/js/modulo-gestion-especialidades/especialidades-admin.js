//funcion para crear alertas personalizadas estilos sweet.
function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    })
}

function activarEspecialidad(id){
    $("#btnActivarEspecialidad").off("click").on("click",function () { 
        let data = {
            id_especialidad: id,
        }
        $.ajax({
            type: "PUT",
            url: "https://springgcp-402821.uc.r.appspot.com/api/especialidades/activar", 
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(data),
            success: function(response, textStatus, xhr) {
                sweetalert('success','Categoria activada', response.message);
                listaEspecialidades("");
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error(errorThrown);
            }
        });
    })
}
function desactivarEspecialidad(id){
    $("#btnDesactivarEspecialidad").off("click").on("click",function () { 
        let data = {
            id_especialidad: id,
        }
        $.ajax({
            type: "PUT",
            url: "https://springgcp-402821.uc.r.appspot.com/api/especialidades/desactivar", 
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(data),
            success: function(response, textStatus, xhr) {
                sweetalert('success','Especialidad desactivada', response.message);
                listaEspecialidades("");
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error(errorThrown);
            }
        });
    })
}

async function editarEspecialidad(id){
    $("#editarEspecialidad").modal("show");
    $("#btnEditarEspecialidad").off("click").on("click",function () { 
        if($.trim($("#inputEditarEspecialidadNombre").val()) !== ''){
            let data = {
                id_especialidad: id,
                especialidad: $("#inputEditarEspecialidadNombre").val()
            }
            $("#inputEditarEspecialidadNombre").val("");
            $.ajax({
                url: 'https://springgcp-402821.uc.r.appspot.com/api/especialidades/actualizar', 
                type: 'PUT', 
                contentType: "application/json",
                crossDomain: true,
                data: JSON.stringify(data), 
                success: function(response, textStatus, xhr) {
                    // Si la solicitud fue exitosa aca...
                    sweetalert('success','Actualizado con exito!',response.message);
                    listaEspecialidades("");
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

function crearListaEspecialidades(especialidades,filtro){
    const contenedorListaEspecialidades = document.getElementById("containerListaEspecialidades");
    $("#containerListaEspecialidades").empty();
    contenedorListaEspecialidades.style.marginTop = "25px";
    if(especialidades.length === 0){
        const mensaje = document.createElement('div');
        mensaje.className = 'alert alert-primary text-center';
        mensaje.textContent = 'No hay especialidades disponibles en este momento.';
        contenedorListaEspecialidades.appendChild(mensaje);
    }
    else{
        especialidades.forEach(especialidad => {
            if (especialidad.especialidad.toLowerCase().includes(filtro.toLowerCase())) {
                const nuevoEspecialidadDiv = document.createElement("div");
                nuevoEspecialidadDiv.className = "container text-center contenedorCurso";
                nuevoEspecialidadDiv.style.marginTop = "6px";
                nuevoEspecialidadDiv .innerHTML = '';
                nuevoEspecialidadDiv.innerHTML = `
                <div class="row">
                <div class="col-8 letraCurso text-start">
                    <p>${especialidad.especialidad}</p>
                </div>
                <div class="col-4 d-grid gap-2 d-md-flex justify-content-md-end container"> <!-- Botones de editar y eliminar -->
                    <button type="button" class="btn btn-light botonesCurso letrabtnEditar btnEditarCategoria" data-bs-toggle="modal"
                        data-id-especialidad="${especialidad.id_especialidad}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                            fill="none">
                            <path
                                d="M19.3 9.425L15.05 5.225L16.45 3.825C16.8333 3.44167 17.3043 3.25 17.863 3.25C18.4217 3.25 18.8923 3.44167 19.275 3.825L20.675 5.225C21.0583 5.60833 21.2583 6.071 21.275 6.613C21.2917 7.155 21.1083 7.61733 20.725 8L19.3 9.425ZM17.85 10.9L7.25 21.5H3V17.25L13.6 6.65L17.85 10.9Z"
                                fill="#1E6DA6" />
                        </svg>
                        <p class="letraBoton" style="padding-top: 10%">Editar</p>
                    </button>
                    ${
                        especialidad.estado
                            ? `<button type="button" class="btn btn-light botonesCurso letrabtnEliminar btnEliminarCategoria" data-bs-toggle="modal" data-bs-target="#eliminarEspecialidad" data-id-especialidad="${especialidad.id_especialidad}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                fill="none">
                                <path
                                    d="M7 21.5C6.45 21.5 5.979 21.304 5.587 20.912C5.195 20.52 4.99933 20.0493 5 19.5V6.5H4V4.5H9V3.5H15V4.5H20V6.5H19V19.5C19 20.05 18.804 20.521 18.412 20.913C18.02 21.305 17.5493 21.5007 17 21.5H7ZM9 17.5H11V8.5H9V17.5ZM13 17.5H15V8.5H13V17.5Z"
                                    fill="#FF0000" />
                                </svg>
                                <p class="letraBoton" style="padding-top: 10%">Desactivar</p>
                            </button>`
                            : `<button type="button" class="btn btn-light botonesCurso letrabtnActivar btnActivarCategoria" data-bs-toggle="modal" data-bs-target="#activarEspecialidad" data-id-especialidad="${especialidad.id_especialidad}">
                                <i class="fa-regular fa-circle-check"></i>
                                <p class="letraBoton" style="padding-top: 10%">Activar</p>
                            </button>`
                    }
        
                </div>
            </div>
            `;
            contenedorListaEspecialidades.appendChild(nuevoEspecialidadDiv);
            }
            
        });
    
        const btnEditar = document.querySelectorAll(".btnEditarCategoria");
        btnEditar.forEach(boton => {
            boton.addEventListener("click", function() {
                const idEspecialidad = boton.dataset.idEspecialidad;
                editarEspecialidad(idEspecialidad);
            });
        });
    
        const btnDelete = document.querySelectorAll(".btnEliminarCategoria");
        btnDelete.forEach(boton => {
            boton.addEventListener("click", function() {
                const idEspecialidad = boton.dataset.idEspecialidad;
                desactivarEspecialidad(idEspecialidad);
            });
        });
    
        const btnActivar = document.querySelectorAll(".btnActivarCategoria");
        btnActivar.forEach(boton => {
            boton.addEventListener("click", function() {
                const idEspecialidad = boton.dataset.idEspecialidad;
                activarEspecialidad(idEspecialidad);
            });
        });
    }
}
function listaEspecialidades(filtro){
    $.ajax({
        type: "GET",
        url: "https://springgcp-402821.uc.r.appspot.com/api/especialidades", 
        contentType: "application/json",
        crossDomain: true,
        success: function(response, textStatus, xhr) {
            crearListaEspecialidades(response,filtro);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}
$('#btnCrearEspecialidad').off("click").on("click",function() {
    // Obtengo el valor del correo electrónico del input
    if($.trim($("#inputCrearEspecialidad-Nombre").val()) !== ''){
        var data = {
            especialidad: $("#inputCrearEspecialidad-Nombre").val(),
        };
        console.log(JSON.stringify(data));
        // Realizamos una solicitud AJAX utilizando jQuery
        $.ajax({
            url: 'https://springgcp-402821.uc.r.appspot.com/api/especialidades/crear', 
            type: 'POST', 
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(data), 
            success: function(response, textStatus, xhr) {
                console.log(response);
                // Si la solicitud fue exitosa aca...
                if(xhr.status == 201){//Se encuentra el correo del usuario, con rol invitado, procedemos a activar su cuenta
                    sweetalert('success','Creada con exito!',response.message);
                    listaEspecialidades("");
                }
            },
            error: function(error) {
                // Ocurrió un error en la solicitud, no encontro correo...
                //dentro del objeto error se encuentra el mensaje de eror y codigo de estado...
                console.log(error);
                if (error.status == 500) {
                    sweetalert('error',"Especialidad Existente",error.responseJSON.message);
                }
            }
        });
    } // fin del condicional para evaluar que los datos esten bien, antes de enviar peticion a la API.
});

const inputBusqueda = document.getElementById("inputBusqueda");

inputBusqueda.addEventListener('input', function() {
    const valorBusqueda = inputBusqueda.value;
    listaEspecialidades(valorBusqueda);
});

$(document).ready(function () {
    listaEspecialidades("");
});