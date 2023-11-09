let idCurso;
let arregloEstudiantesInscritos = [];
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
            $("#estado_estudiante").text(student.estudiante.id_usuario.estado ? "Estado: Activo" : "Estado: Desactivado");
            $("#especialidad_estudiante").text(student.estudiante.id_usuario.rol.roles);
            $("#correo_estudiante").text("Correo: " + student.estudiante.id_usuario.correo);
            $("#descripcion_estudiante").text("Descripción: " + student.estudiante.descripcion);
            // Mostramos el modal
            $("#modal-Estudiante").modal("show");
            //console.log("cargo el modal por fin.")
        })
        .catch(error => {
            console.error(error);
        });
}
function crearListaEstudiantesInscritos(estudiante) {
    const contenedorListaUsuarios = document.getElementById("containerUsuariosInscritos");
    $("#containerUsuariosInscritos").empty();
    contenedorListaUsuarios.style = "width:100%";

    if (estudiante.length === 0) {
        const mensaje = document.createElement('div');
        mensaje.className = 'alert alert-primary text-center';
        mensaje.textContent = 'No hay usuarios inscritos en este momento.';
        contenedorListaUsuarios.appendChild(mensaje);
    } else {
        estudiante.forEach(usuario => {
            //console.log(usuario.id_usuario.id_usuario);
            const nuevoDocenteDiv = document.createElement("div");
            nuevoDocenteDiv.className = "container tarjeta";
            nuevoDocenteDiv.style = "margin-top:5px";
            nuevoDocenteDiv.innerHTML = '';
            nuevoDocenteDiv.innerHTML = `
                <div class="imagenUser">
                    <img class="imagenUser" src="${usuario.imagen}">
                </div>
                    <div class="nombreDocenteBox">
                        <p class="EstudianteNombreTxt">${usuario.nombre}</p>
                        <p class="EstudianteTxt">${usuario.id_usuario.rol.roles}</p>
                    </div>
                    <button class="BotonVerMas"  data-id-estudiante="${usuario.id_estudiante}">
                        <div class="BotonEditSymbol">
                            <svg width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M 6.75 7.5 C 6.75 8.892 7.303 10.228 8.288 11.212 C 9.272 12.197 10.608 12.75 12 12.75 C 13.392 12.75 14.728 12.197 15.712 11.212 C 16.697 10.228 17.25 8.892 17.25 7.5 C 17.25 6.108 16.697 4.772 15.712 3.788 C 14.728 2.803 13.392 2.25 12 2.25 C 10.608 2.25 9.272 2.803 8.288 3.788 C 7.303 4.772 6.75 6.108 6.75 7.5 Z M 19.5 21.75 H 3.75 C 3.551 21.75 3.36 21.671 3.22 21.53 C 3.079 21.39 3 21.199 3 21 V 18.75 C 3 17.755 3.395 16.802 4.098 16.098 C 4.802 15.395 5.755 15 6.75 15 H 17.25 C 18.245 15 19.198 15.395 19.902 16.098 C 20.605 16.802 21 17.755 21 18.75 V 21 C 21 21.199 20.921 21.39 20.78 21.53 C 20.64 21.671 20.449 21.75 20.25 21.75 H 19.5 Z" fill="#1E6DA6" />
                            </svg>
                        </div>
                        <p class="BotonVerMasText" >Ver más</p>
                    </button>
        `;
            // Adjuntando el contenedor al DOM, con la lista de docentes
            contenedorListaUsuarios.appendChild(nuevoDocenteDiv);

        });

        const btnVerMas = document.querySelectorAll(".BotonVerMas");
        btnVerMas.forEach(boton => {
            boton.addEventListener("click", function () {
                const idEstudiante = boton.dataset.idEstudiante;
                mostrarModal(idEstudiante);
            });
        });

    }
}
function obtenerListaEstudiantesInscritos() {
    // Hacer la solicitud al servidor para obtener las noticias del usuario
    $.ajax({
        type: "GET",
        url: "https://springgcp-402821.uc.r.appspot.com/api/curso-usuario/ver-estudiantes-curso/" + idCurso,
        contentType: "application/json",
        crossDomain: true,
        success: function (response, textStatus, xhr) {
            // Almacenar los datos en el arreglo local arregloCursos
            arregloEstudiantesInscritos = response;
            //console.log(arregloEstudiantesInscritos);
            // Llamar a la función para mostrar los cursos en la página
            crearListaEstudiantesInscritos(arregloEstudiantesInscritos);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}

$(document).ready(function () {
    id
    //Curso = localStorage.getItem('idCursoNoDisponible');console.log("SE ESTA QUERIENDO VER LOS ESTUDIANTES DEL CURSO CON ID: ", idCurso);
    obtenerListaEstudiantesInscritos();
    
});