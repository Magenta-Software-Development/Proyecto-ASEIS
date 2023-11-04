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
                                    
                                    <div class="botonCurso botonFiltroActivoCurso">
                                        <button class="btnVerMasCurso" data-id-curso="${curso.id_curso}" >
                                            más información
                                        </button>
                                    </div>
                    
                                    <div class="botonCurso botonFiltroDesactivoCurso ${curso.estado ? '' : 'BotonDeleteDisabled'}" ${curso.estado ? '' : 'disabled'}>
                                        <button class="btnDeshabilitarCurso ${curso.estado ? '' : 'BotonDeleteDisabled'}" data-id-curso="${curso.id_curso}" ${curso.estado ? '' : 'disabled'}>
                                            Deshabilitar
                                        </button>
                                    </div>
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
                //verMas(idCurso);
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