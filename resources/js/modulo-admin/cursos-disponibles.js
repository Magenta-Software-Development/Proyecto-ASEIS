function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    });
}
function sweetalertquestion(icon,title,message,messageConfirmButton, icon2,title2,message2, id){
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
                id_curso : id
            }
            $.ajax({
                type: "POST",
                url: "https://springgcp-402821.uc.r.appspot.com/api/cursos/desactivar",
                contentType: "application/json",
                crossDomain: true,
                data: JSON.stringify(data),
                success: function (response, textStatus, xhr) {
                    sweetalert(icon2,title2,message2);
                    listaCursosDisponibles("");
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    });
}
async function getInfoCurso(id) {
    try {
        const response = await $.ajax({
            type: "GET",
            url: "https://springgcp-402821.uc.r.appspot.com/api/cursos/buscar-curso/" + id,
            contentType: "application/json",
            crossDomain: true
        });
        return response;
    } catch (error) {
        throw error;
    }
}
function verMasInformacion(id){
    const contenedorTemarioCurso = document.getElementById("contenedorTemarioCurso");
    contenedorTemarioCurso.style.marginTop = '2rem';
    contenedorTemarioCurso.style.marginBottom = '3.2rem';
    contenedorTemarioCurso.innerHTML = '';

    getInfoCurso(id)
        .then(curso => {
            // Actualizando el contenido del modal con los datos del docente
            $("#imagenCurso").attr("src", curso.curso.imagen);
            $("#tituloCurso").text(curso.curso.titulo);
            $("#tutorAsignado").text(curso.curso.id_docente.nombre);
            $("#fechaInicioCurso").text(curso.curso.fecha_ini);
            $("#fechaFinCurso").text(curso.curso.fecha_fin);
            $("#horarioCurso").text(curso.curso.horario);
            $("#modalidadCurso").text(curso.curso.id_modalidad.modalidad);
            $("#tutorAsignado").text(curso.curso.nombre);
            $("#cuposCurso").text(curso.curso.cupo);
            $("#puntuacionCurso").text(curso.curso.puntuacion);
            $("#cuposCurso").text(curso.curso.cupo);
            $("#descripcionCurso").text(curso.curso.descripcion);
            
            const longitudTemas = Object.keys(curso.curso.temas.contenido).length;
            //console.log("Número de temas:", longitudTemas);
            if (longitudTemas === 0) {
                const mensaje = document.createElement('div');
                mensaje.style.marginTop = '3rem';
                mensaje.style.marginBottom = '3rem';
                mensaje.className = 'alert alert-primary text-center';
                mensaje.textContent = 'En este momento este curso no posee temas.';
                contenedorTemarioCurso.appendChild(mensaje);
            }else{
                for (const temas in curso.curso.temas.contenido) {
                    const descripcionTema = curso.curso.temas.contenido[temas];
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


            // Ahora muestro el modal, cuando ya cargue todos los datos
            $("#modalMasInformacion").modal('show');
           // console.log("cargo el modal por fin.")
        })
        .catch(error => {
            console.error(error);
        });
}
function desactivarCurso(id){
    sweetalertquestion("warning","Deshabilitando curso","Estas seguro de deshabilitar este curso?","Si, deshabilitar","success","Curso deshabilitado con exito","Se ha deshabilitado el curso de manera exitosa!",id)
}
function crearListaCursos(cursos,filtro){
    const contenedorListaCursos = document.getElementById("container-cursos-publicados");
    $("#container-cursos-publicados").empty();
    contenedorListaCursos.style.marginTop = "25px";
    contenedorListaCursos.style.width = "100%"

    const cursosPublicados = cursos.cursos.filter(curso => curso.estado);

    if (cursosPublicados.length === 0){
        const mensaje = document.createElement('div');
        mensaje.className = 'alert alert-primary text-center';
        mensaje.textContent = 'No hay cursos disponibles en este momento.';
        contenedorListaCursos.appendChild(mensaje);
    }
    else{
        cursos.cursos.forEach(curso => {
            //if(curso.currso.categoria.toLowerCase().includes(filtro.toLowerCase())){
            //}
            if(curso.estado){
                    const nuevoCursoDiv = document.createElement("div");
                    nuevoCursoDiv.style.marginTop = "8px"
                    nuevoCursoDiv .innerHTML = '';
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
                                    <button class="botonCurso botonFiltroActivoCurso btnVerMasCurso" data-id-curso="${curso.id_curso}" >
                                        Más información
                                    </button>
                                    <br>
                                    <button class="botonCurso botonFiltroDesactivoCurso btnDeshabilitarCurso ${curso.estado ? '' : 'BotonDeleteDisabled'}" data-id-curso="${curso.id_curso}" ${curso.estado ? '' : 'disabled'}>
                                        Deshabilitar
                                    </button>
                                </div>
                        </div>
                    </div>
                 `;
                contenedorListaCursos.appendChild(nuevoCursoDiv);
            }
        });

        const btnDeshabilitarCurso = document.querySelectorAll(".btnDeshabilitarCurso");
        btnDeshabilitarCurso.forEach(boton => {
            boton.addEventListener("click", function() {
                const idCurso = boton.dataset.idCurso;
                console.log(idCurso);
                desactivarCurso(idCurso);
            });
        });

        const btnVerMasCurso = document.querySelectorAll(".btnVerMasCurso");
        btnVerMasCurso.forEach(boton => {
            boton.addEventListener("click", function() {
                const idCurso = boton.dataset.idCurso;
                verMasInformacion(idCurso);
                //console.log(idCurso);
            });
        });
    }
}
function listaCursosDisponibles(filtro){
    $.ajax({
        type: "GET",
        url: "https://springgcp-402821.uc.r.appspot.com/api/cursos/ver",
        contentType: "application/json",
        crossDomain: true,
        success: function(response, textStatus, xhr) {
            crearListaCursos(response,filtro);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}
$(document).ready(function () {
    listaCursosDisponibles("");
});
