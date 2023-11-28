let arregloCursos = [];

function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    });
}
function sweetalertquestion(icon, title, message, messageConfirmButton, icon2, title2, message2, id) {
    Swal.fire({
        title: title,
        text: message,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: messageConfirmButton
    }).then((result) => {
        if (result.isConfirmed) {
            let data = {
                id_curso: id
            }
            $.ajax({
                type: "POST",
                url: "https://springgcp-402821.uc.r.appspot.com/api/cursos/activar",
                contentType: "application/json",
                crossDomain: true,
                data: JSON.stringify(data),
                success: function (response, textStatus, xhr) {
                    sweetalert(icon2, title2, message2);
                    obtenerListaCursosNoDisponibles("");
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    });
}
function comentariosalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    });
    const idCurso = localStorage.getItem("idCursoNoDisponible");
    verMasInformacion(idCurso);
}
$("#EliminarBtn").data("id-comentario", null);
function openModal(idComentario) {
    document.getElementById('myModal').style.display = 'flex';
    $("#EliminarBtn").data("id-comentario", idComentario);
}
$("#EliminarBtn").off("click").on("click", function () {
    const idComentario = $(this).data("id-comentario");
    if (idComentario !== null) {
        let data = {
            id_curso_comentario: idComentario,
        }
        $.ajax({
            type: "DELETE",
            url: "https://springgcp-402821.uc.r.appspot.com/api/comentario/eliminar",
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(data),
            success: function (response, textStatus, xhr) {
                comentariosalert("success", "Comentario eliminado", response.message);
                // Restablece el valor a null después de eliminar el comentario
                $("#EliminarBtn").data("id-comentario", null);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    }
});
function closeModal() {
    document.getElementById('myModal').style.display = 'none';
}
async function getComentariosCurso(id){
    try {
        const response = await $.ajax({
            type: "GET",
            url: "https://springgcp-402821.uc.r.appspot.com/api/comentario/curso/" + id,
            contentType: "application/json",
            crossDomain: true
        });
        return response.comentarios;
    } catch (error) {
        throw error;
    }
}
async function verMasInformacion(id) {
    const idCurso = parseInt(id);
    const comentarios = await getComentariosCurso(idCurso);
    const contenedorTemarioCurso = document.getElementById("contenedorTemarioCurso");
    contenedorTemarioCurso.style.marginTop = '2rem';
    contenedorTemarioCurso.style.marginBottom = '3.2rem';
    contenedorTemarioCurso.innerHTML = '';
    ///
    const contenedorComentarios = document.getElementById("commentsContainer");
    contenedorComentarios.innerHTML = '';
    ////
    const curso = arregloCursos.cursos.find(course => course.id_curso === idCurso);
    if (curso) {
        // Actualizando el contenido del modal con los datos del docente
        $("#imagenCurso").attr("src", curso.imagen);
        $("#tituloCurso").text(curso.titulo);
        $("#tutorAsignado").text(curso.id_docente.nombre);
        $("#fechaInicioCurso").text(curso.fecha_ini);
        $("#fechaFinCurso").text(curso.fecha_fin);
        $("#horarioCurso").text(curso.horario);
        $("#modalidadCurso").text(curso.id_modalidad.modalidad);
        $("#tutorAsignado").text(curso.nombre);
        $("#cuposCurso").text(curso.cupo);
        $("#puntuacionCurso").text(curso.puntuacion);
        $("#cuposCurso").text(curso.cupo);
        $("#descripcionCurso").text(curso.descripcion);

        const longitudTemas = Object.keys(curso.temas.contenido).length;
        //console.log("Número de temas:", longitudTemas);
        if (longitudTemas === 0) {
            const mensaje = document.createElement('div');
            mensaje.style.marginTop = '3rem';
            mensaje.style.marginBottom = '3rem';
            mensaje.className = 'alert alert-primary text-center';
            mensaje.textContent = 'En este momento este curso no posee temas.';
            contenedorTemarioCurso.appendChild(mensaje);
        } else {
            for (const temas in curso.temas.contenido) {
                const descripcionTema = curso.temas.contenido[temas];
                const tema = temas;
                const contenedorAcordion = document.createElement('div');
                contenedorAcordion.style.marginTop = "1rem";
                contenedorAcordion.className = "accordion accordion-flush";
                contenedorAcordion.innerHTML = '';
                contenedorAcordion.innerHTML = `
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#${tema}" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <label for="descripcionAcordion">${tema}</label>
                                        </button>
                                    </h2>
                                    <div id="${tema}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne">
                                        <div class="accordion-body" style="visibility:visible !important">
                                            ${descripcionTema.descripcion}
                                        </div>
                                    </div>
                                </div>
                            `;
                contenedorTemarioCurso.appendChild(contenedorAcordion);
            }
        }

        const longitudComentarios = Object.keys(comentarios).length;
        //console.log(comentarios);
        if(longitudComentarios === 0){
            const mensaje = document.createElement('div');
            mensaje.style.marginTop = '3rem';
            mensaje.style.marginBottom = '3rem';
            mensaje.className = 'alert alert-primary text-center';
            mensaje.textContent = 'Este curso no posee comentarios.';
            contenedorComentarios.appendChild(mensaje);
        }else{
            comentarios.forEach(comentario =>{
                const contenedorTarjetaComentario = document.createElement('div');
                contenedorTarjetaComentario.className = "tarjetaEstModalC";
                contenedorTarjetaComentario.innerHTML = '';
                //console.log(comentario.id_estudiante);
                contenedorTarjetaComentario.innerHTML = `
                    <div class="tarjetaEstModal-body">
                    <div class="row">
                        <div class="col-md-2 fotoContenedor">
                            <img src="${comentario.id_estudiante.imagen}"
                                alt="Foto del Estudiante"
                                class="foto-estudianteP fotoContenedor" id="fotoPerfil" />
                        </div>
                        <div class="tarjetaComentario">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="EstudianteC" id="nombreEstudiante">
                                            ${comentario.id_estudiante.nombre}
                                        </h5>
                                    </div>
        
                                </div>
                                <div class="row comentarioEs">
                                    <p class="EstudianteC" id="comentarioE">
                                        <p> ${comentario.comentario}</p>
                                    </p>
                                </div>
                                <div class="row">
                                    <div
                                        class="col-md-12 d-flex justify-content-center align-items-center contenedorBotonEC">
                                        <button class="estilosBtn buttonsDeleteCo"
                                            id="btnComentarioE" data-id-comentario="${comentario.id_curso_comentario}">
                                            <i class="fa-solid fa-trash-can"></i>
                                            <p id="textBtnComentario">Eliminar
                                                Comentario</p>
                                        </button>
        
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
                `;
            contenedorComentarios.appendChild(contenedorTarjetaComentario);
            });
            
            const btnEliminarComentario = document.querySelectorAll(".buttonsDeleteCo");
            btnEliminarComentario.forEach(boton => {
                boton.addEventListener("click", function () {
                    const idComentario = boton.dataset.idComentario;
                    openModal(idComentario);
                });
            });

        }

        // Ahora muestro el modal, cuando ya cargue todos los datos
        $("#modalMasInformacion").modal('show');
        // console.log("cargo el modal por fin.")
    } else {
        console.error("Curso no encontrado en el arreglo.");
    }
    localStorage.setItem('idCursoNoDisponible',id);
}
function activarCurso(id) {
    sweetalertquestion("warning", "Habilitando curso", "Estas seguro de habilitar este curso?", "Si, habilitar", "success", "Curso habilitado con exito", "Se ha habilitado el curso de manera exitosa!", id)
}
function crearListaCursos(cursos) {
    const contenedorListaCursos = document.getElementById("container-cursos-no-publicados");
    $("#container-cursos-no-publicados").empty();
    contenedorListaCursos.style.marginTop = "25px";
    contenedorListaCursos.style.width = "100%"

    const cursosNoPublicados = cursos.filter(curso => !curso.estado).reverse();

    if (cursosNoPublicados.length === 0) {
        const mensaje = document.createElement('div');
        mensaje.className = 'alert alert-primary text-center';
        mensaje.textContent = 'No hay cursos deshabilitados en este momento.';
        // Agregar el mensaje al contenedor en tu página
        contenedorListaCursos.appendChild(mensaje);
    }
    else {
        cursosNoPublicados.forEach(curso => {
            //if(curso.currso.categoria.toLowerCase().includes(filtro.toLowerCase())){
            //}
            const nuevoCursoDiv = document.createElement("div");
            nuevoCursoDiv.style.marginTop = "8px"
            nuevoCursoDiv.innerHTML = '';
            nuevoCursoDiv.innerHTML = `
                    <div class="container contenedorCursos">
                        <div class="row tablaContenidosCursos">
                                <div class="col-sm-4 align-items-start"><!-- imagen del curso -->
                                    <img class="contenedorImagen" src="${curso.imagen}">
                                </div>

                                <div class="col-sm-3"><!-- nombre del curso y de el docente -->
                                    <div class="contenedorNombreCurso">${curso.titulo}</div>
                                    <div class="contenedorNombreDocente">${curso.id_docente.nombre}</div>
                                </div>

                                <div class="col-sm-5 custom-align-bottom"><!-- botones de mas informacion y habilitar -->
                                    <button class="btnVerMasCurso botonCurso botonFiltroActivoCurso" data-id-curso="${curso.id_curso}">
                                    Más información
                                    </button>
                    <br>
                                    <button class="botonCurso botonFiltroDesactivoCurso btnHabilitarCurso ${curso.estado ? 'BotonDeleteDisabled' : ''}" data-id-curso="${curso.id_curso}"  ${curso.estado ? 'disabled' : ''}>
                                        Habilitar
                                    </button>
                                </div>
                        </div>
                    </div>
                `;
            contenedorListaCursos.appendChild(nuevoCursoDiv);
        });

        const btnHabilitarCurso = document.querySelectorAll(".btnHabilitarCurso");
        btnHabilitarCurso.forEach(boton => {
            boton.addEventListener("click", function () {
                const idCurso = boton.dataset.idCurso;
                activarCurso(idCurso);
            });
        });

        const btnVerMasCurso = document.querySelectorAll(".btnVerMasCurso");
        btnVerMasCurso.forEach(boton => {
            boton.addEventListener("click", function () {
                const idCurso = boton.dataset.idCurso;
                verMasInformacion(idCurso);
            });
        });
    }
}
function obtenerListaCursosNoDisponibles() {
    // Hacer la solicitud al servidor para obtener las noticias del usuario
    $.ajax({
        type: "GET",
        url: "https://springgcp-402821.uc.r.appspot.com/api/cursos/ver",
        contentType: "application/json",
        crossDomain: true,
        success: function (response, textStatus, xhr) {
            // Almacenar los datos en el arreglo local arregloCursos
            arregloCursos = response;
            // Llamar a la función para mostrar los cursos en la página
            crearListaCursos(arregloCursos.cursos);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}
function buscarCursos(filtro) {
    // Realizar la búsqueda en el arreglo local ArregloCursos
    const resultados = arregloCursos.cursos.filter(curso => {
        // Aplicar lógica de filtrado según el filtro proporcionado por el usuario
        // Por ejemplo, buscar en el título del curso
        return curso.titulo.toLowerCase().includes(filtro.toLowerCase());
    });

    // Llamar a la función para mostrar los resultados en la página
    crearListaCursos(resultados);
}
const inputBusqueda = document.getElementById("inputBusqueda");
inputBusqueda.addEventListener('input', function () {
    const valorBusqueda = inputBusqueda.value;
    buscarCursos(valorBusqueda);
});
$(document).ready(function () {
    obtenerListaCursosNoDisponibles();
});
