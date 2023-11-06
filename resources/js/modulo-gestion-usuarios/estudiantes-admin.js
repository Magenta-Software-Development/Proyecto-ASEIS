//funcion para crear alertas personalizadas estilos sweet.
function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    })
}

//funcion asincrona para cargar los datos, utilizada para llevar los datos al modal editar.
async function cargarDatos(id) {
    try {
        let estudiante = await getInfoEstudiante(id); //espera una promesa, de la funcion getInfoEstudiante
        $("#inputNombreEstudiante").val(estudiante.estudiante.nombre); //de la promesa que obtenemos agregamos el valor nombre del estudiante
        $("#inputDescripcionEstudiante").val(estudiante.estudiante.descripcion); //asignamos al input el valor de la descripcion del estudiante
        return estudiante; // Devolviendo el docente para su posterior uso a la hora de actualizar
    } catch (error) {
        console.error(error);
        throw error;
    }
}
async function editarEstudiante(id){
    const estudianteTemp = await cargarDatos(id);
    //console.log(estudianteTemp.estudiante.current_year);
    $("#btnEditarEstudiante").off("click").on("click",function (e) { 
        if($.trim($("#inputNombreEstudiante").val()) !== '' && $.trim($("#inputDescripcionEstudiante").val()) !== ''){
            let data = {
                nombre: $("#inputNombreEstudiante").val(),
                edad: -1,
                year: -1,
                current_year: estudianteTemp.estudiante.current_year,
                descripcion: $("#inputDescripcionEstudiante").val(),
                due: estudianteTemp.estudiante.due
            }
            $("#inputNombreEstudiante").val("");
            $("#inputDescripcionEstudiante").val("");
            $.ajax({
                url: 'https://springgcp-402821.uc.r.appspot.com/api/estudiantes/actualizar/'+id, 
                type: 'PUT', 
                contentType: "application/json",
                crossDomain: true,
                data: JSON.stringify(data), 
                success: function(response, textStatus, xhr) {
                    // Si la solicitud fue exitosa aca...
                    sweetalert('success','Actualizado con exito!',response.message);
                    listarEstudiantes("");
                },
                error: function(error) {
                    // Ocurrió un error en la solicitud, no encontro correo...
                    console.error('Error en la solicitud AJAX:', error);
                    //dentro del objeto error se encuentra el mensaje de eror y codigo de estado...
                    if (error.status == 500) {
                        sweetalert('error',"Ocurrio un error",error.responseJSON.message);
                    }
                }
            });    
        }
    });
}
function desactivarEstudiante(id){
    $("#btnDesactivarEstudiante").off("click").on("click",function () { 
        $.ajax({
            type: "PUT",
            url: "https://springgcp-402821.uc.r.appspot.com/api/usuarios/desactivar/" + id, 
            contentType: "application/json",
            crossDomain: true,
            success: function(response, textStatus, xhr) {
                sweetalert('success','Usuario desactivado', response.message);
                listarEstudiantes("");
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error(errorThrown);
            }
        });
    })

}

async function getInfoEstudiante(id) {
    try {
        const response = await $.ajax({
            type: "GET",
            url: "https://springgcp-402821.uc.r.appspot.com/api/estudiantes/buscar-estudiante/" + id,
            contentType: "application/json",
            crossDomain: true
        });
        return response;
    } catch (error) {
        throw error;
    }
}

function mostrarModal(id) {
    getInfoEstudiante(id)
    .then(student => {
        //console.log(student);
        //console.log(student.estudiante.id_usuario.rol.roles);
        // Actualizamos el contenido del modal con los datos del estudiante
        $("#img_estudiante").attr("src", student.estudiante.imagen);
        $("#nombre_estudiante").text(student.estudiante.nombre);
        $("#estado_estudiante").text(student.estudiante.id_usuario.estado?"Estado: Activo":"Estado: Desactivado");
        $("#especialidad_estudiante").text(student.estudiante.id_usuario.rol.roles);
        $("#correo_estudiante").text("Correo: "+student.estudiante.id_usuario.correo);
        $("#descripcion_estudiante").text("Descripción: " + student.estudiante.descripcion);
        // Mostramos el modal
        $("#modal-Estudiante").modal("show");
        //console.log("cargo el modal por fin.")
    })
    .catch(error => {
        console.error(error);
    });
}

function crearListaEstudiantes(usuarios,filtro) {
    const contenedorEstudiantes = document.getElementById("contenedorEstudiantes");
    $("#contenedorEstudiantes").empty();
    contenedorEstudiantes.style = "width:100%";
    if(usuarios.length === 0){
        const mensaje = document.createElement('div');
        mensaje.className = 'alert alert-primary text-center';
        mensaje.textContent = 'No hay estudiantes creados en este momento.';
        contenedorEstudiantes.appendChild(mensaje); 
    }else{
        usuarios.forEach(usuario => {
            if(usuario.nombre.toLowerCase().includes(filtro.toLowerCase())){
                    const nuevoEstudianteDiv = document.createElement("div");
                    nuevoEstudianteDiv.className = "cuerpoUsuarios";
                    nuevoEstudianteDiv.style = "margin-top:5px";
                    nuevoEstudianteDiv .innerHTML = '';
                    nuevoEstudianteDiv.innerHTML = `
                    <div class="imagenUsuario"><img src="${usuario.imagen}"></div>
                    <div class="nombreDocenteBox">
                        <p class="DocenteNombreTxt">${usuario.nombre}</p>
                        <p class="DocenteDescripcionTxt">${usuario.id_usuario.estado?"Activo":"Inactivo"}</p>
                    </div>
                    <button class="BotonEdit" data-bs-toggle="modal" data-bs-target="#modal-EstudianteE" data-id-estudiante="${usuario.id_estudiante}">
                        <div class="BotonEditSymbol">
                            <svg width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 19.3 8.925 L 15.05 4.725 L 16.45 3.325 C 16.833 2.942 17.304 2.75 17.863 2.75 C 18.422 2.75 18.892 2.942 19.275 3.325 L 20.675 4.725 C 21.058 5.108 21.258 5.571 21.275 6.113 C 21.292 6.655 21.108 7.117 20.725 7.5 L 19.3 8.925 Z M 17.85 10.4 L 7.25 21 H 3 V 16.75 L 13.6 6.15 L 17.85 10.4 Z" fill="#1E6DA6" />
                            </svg>
                        </div>
                        <p class="BotonEditarText">Editar</p>
                    </button>
                    <button class="BotonVerMas"  data-id-estudiante="${usuario.id_estudiante}">
                        <div class="BotonEditSymbol">
                            <svg width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 6.75 7.5 C 6.75 8.892 7.303 10.228 8.288 11.212 C 9.272 12.197 10.608 12.75 12 12.75 C 13.392 12.75 14.728 12.197 15.712 11.212 C 16.697 10.228 17.25 8.892 17.25 7.5 C 17.25 6.108 16.697 4.772 15.712 3.788 C 14.728 2.803 13.392 2.25 12 2.25 C 10.608 2.25 9.272 2.803 8.288 3.788 C 7.303 4.772 6.75 6.108 6.75 7.5 Z M 19.5 21.75 H 3.75 C 3.551 21.75 3.36 21.671 3.22 21.53 C 3.079 21.39 3 21.199 3 21 V 18.75 C 3 17.755 3.395 16.802 4.098 16.098 C 4.802 15.395 5.755 15 6.75 15 H 17.25 C 18.245 15 19.198 15.395 19.902 16.098 C 20.605 16.802 21 17.755 21 18.75 V 21 C 21 21.199 20.921 21.39 20.78 21.53 C 20.64 21.671 20.449 21.75 20.25 21.75 H 19.5 Z" fill="#1E6DA6" />
                            </svg>
                        </div>
                        <p class="BotonVerMasText">Ver más</p>
                    </button>
                    <button type="button" class="BotonDelete ${usuario.id_usuario.estado ? '' : 'BotonDeleteDisabled'}" data-bs-toggle="modal" data-bs-target="#modalconfirmacion" data-id-estudiante="${usuario.id_estudiante}" data-id-usuario="${usuario.id_usuario.id_usuario}" ${usuario.id_usuario.estado ? '' : 'disabled'}>
                        <div class="BotonEditSymbol">
                            <i class="fa-solid fa-ban" style="color: #1E6DA6;"></i>
                        </div>
                    </button>
                `;
                // Adjuntando el contenedor al DOM, con la lista de docentes
                contenedorEstudiantes.appendChild(nuevoEstudianteDiv);
            }
        });
    
        const btnVerMas = document.querySelectorAll(".BotonVerMas");
        btnVerMas.forEach(boton => {
            boton.addEventListener("click", function() {
                const idEstudiante = boton.dataset.idEstudiante;
                mostrarModal(idEstudiante);
            });
        });
    
        const btnEditar = document.querySelectorAll(".BotonEdit");
        btnEditar.forEach(boton => {
            boton.addEventListener("click", function() {
                const idEstudiante = boton.dataset.idEstudiante;
                editarEstudiante(idEstudiante);
            });
        });
    
        const btnDelete = document.querySelectorAll(".BotonDelete");
        btnDelete.forEach(boton => {
            boton.addEventListener("click", function() {
                desactivarEstudiante(boton.dataset.idUsuario);
            });
        });
    }
}

function validandoDatos(){
    let email = document.getElementById("emailEstudiante").value;
    let password = document.getElementById("passwordEstudiante").value;
    //Se valida que los campos no estén vacios
    if (email.trim() === '' || password.trim() === '') {
          sweetalert("warning","Los campos están vacios", "Por favor, llene adecuadamente los campos que se le piden.");
        return(false);
    }
    // Se valida el formato del correo electrónico usando expresiones regulares, tiene que ser terminacxion @ues.edu.sv
    var emailRegex = /^[a-zA-Z0-9._%+-]+@ues\.edu\.sv$/;
    if (!emailRegex.test(email)) {
        sweetalert("warning","Formato incorrecto", "Los correos deben tener terminacion @ues.edu.sv");        //alert("El correo debe ser de la forma: usuario@ues.edu.sv");
        return false;
    }

    // Se valida la contraseña del input
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
    if (!passwordRegex.test(password)) {
        sweetalert("warning","Contraseña Incorrecta","La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número");
        return false;
    }
    ///alert("Formulario válido, puedes continuar.");
    return true;  
}

function listarEstudiantes(filtro){
    $.ajax({
        type: "GET",
        url: "https://springgcp-402821.uc.r.appspot.com/api/estudiantes/buscar-todos", 
        contentType: "application/json",
        crossDomain: true,
        success: function(response, textStatus, xhr) {
            //console.log(response);
            crearListaEstudiantes(response,filtro);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}
  //Le agrego un evento de clic al boton crear docente, si se da clic se ejecuta la siguiente funcion
$('#btnCrearEstudiante').off("click").on("click",function() {
    // Obtengo el valor del correo electrónico del input
    if(validandoDatos()){
        var data = {
            correo: $("#emailEstudiante").val(),
            password: $("#passwordEstudiante").val(),
            estado: 1
        };
        console.log(JSON.stringify(data));
        // Realizamos una solicitud AJAX utilizando jQuery
        $.ajax({
            url: 'https://springgcp-402821.uc.r.appspot.com/api/usuarios/crear-estudiante', 
            type: 'POST', 
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(data), 
            success: function(response, textStatus, xhr) {
                if(xhr.status == 201){//Se encuentra el correo del usuario, con rol invitado, procedemos a activar su cuenta
                    sweetalert('success','Creado con exito!',response.message);
                    listarEstudiantes("");
                }
            },
            error: function(error) {
                // Ocurrió un error en la solicitud, no encontro correo...
                //dentro del objeto error se encuentra el mensaje de eror y codigo de estado...
                if (error.status == 500) {
                    sweetalert('error',"Correo Existente",error.responseJSON.message);
                }
            }
        });
    } // fin del condicional para evaluar que los datos esten bien, antes de enviar peticion a la API.
});
const inputBusqueda = document.getElementById("inputBusqueda");

inputBusqueda.addEventListener('input', function() {
    const valorBusqueda = inputBusqueda.value;
    listarEstudiantes(valorBusqueda);
});
$(document).ready(function () {
    listarEstudiantes("");
});
