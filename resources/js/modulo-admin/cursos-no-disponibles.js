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
                    listaCursosNoDisponibles("");
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    });
}
function activarCurso(id) {
    sweetalertquestion("warning", "Habilitando curso", "Estas seguro de habilitar este curso?", "Si, habilitar", "success", "Curso habilitado con exito", "Se ha habilitado el curso de manera exitosa!", id)
}
function crearListaCursos(cursos, filtro) {
    const contenedorListaCursos = document.getElementById("container-cursos-no-publicados");
    $("#container-cursos-no-publicados").empty();
    contenedorListaCursos.style.marginTop = "25px";
    contenedorListaCursos.style.width = "100%"

    const cursosNoPublicados = cursos.cursos.filter(curso => !curso.estado);

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
                console.log(idCurso);
                //verMas(id);
            });
        });
    }


}
function listaCursosNoDisponibles(filtro) {
    $.ajax({
        type: "GET",
        url: "https://springgcp-402821.uc.r.appspot.com/api/cursos/ver",
        contentType: "application/json",
        crossDomain: true,
        success: function (response, textStatus, xhr) {
            crearListaCursos(response, filtro);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}
$(document).ready(function () {
    listaCursosNoDisponibles("");
});
