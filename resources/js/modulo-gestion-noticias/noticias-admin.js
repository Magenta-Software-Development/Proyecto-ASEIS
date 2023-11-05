function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    });
}

function sweetalertquestion(icon,title,message,messageConfirmButton, icon2,title2,message2){
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
        }
    });
}

function obtenerNoticiaPorId(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "https://springgcp-402821.uc.r.appspot.com/api/noticias/"+id,
            contentType: "application/json",
            crossDomain: true,
            success: function(response, textStatus, xhr) {
                resolve(response);
            },
            error: function(xhr, textStatus, errorThrown) {
                reject(errorThrown);
            }
        });
    });
}

function verMasInformacionNoticia(id) {
    const cuerpoNoticia = document.getElementById("cuerpoDeNoticia");
    obtenerNoticiaPorId(id)
        .then(noticia => {
            //console.log(noticia);
            console.log(noticia.noticia.titulo) // imprime 'Crean una nueva libreria de javascript llamada HTMX'
            $("#txtEncabezadoNoticia").text(noticia.noticia.titulo);
            $('#imgNoticia').attr('src', noticia.noticia.imagen);
            cuerpoNoticia.innerHTML = `
                ${noticia.noticia.descripcion}
            `;
        })
        .catch(error => {
            console.error(error);
        });
    $("#modalMasInfo").modal("show");
}



function eliminarNoticia(id){
    $("#btnEliminarNoticia").off("click").on("click",function (e) {
        e.preventDefault();
        let data = {
            id_noticia : id
        }
        $.ajax({
            type: "POST",
            url: "https://springgcp-402821.uc.r.appspot.com/api/noticias/eliminar",
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(data),
            success: function (response, textStatus, xhr) {
                $("#modalEliminar").modal("hide");
                sweetalert("success","Noticia Eliminada","La noticia ha sido eliminada con exito!");
                listaNoticias("");
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    })
}
function crearListaNoticias(noticias,filtro){
    const contenedorListaNoticias = document.getElementById("container-noticias");
    $("#container-noticias").empty();
    contenedorListaNoticias.style.marginTop = "25px";
    contenedorListaNoticias.style.width = "100%"

    if (noticias.length === 0) {
        const mensaje = document.createElement('div');
        mensaje.className = 'alert alert-primary text-center';
        mensaje.textContent = 'No hay noticias disponibles en este momento.';
        contenedorListaNoticias.appendChild(mensaje);
    }
    else{
        noticias.forEach(noticia => {
            //if(noticias.currso.categoria.toLowerCase().includes(filtro.toLowerCase())){
            //}
            const nuevaNoticiaDiv = document.createElement("div");
            nuevaNoticiaDiv.style.marginTop = "8px"
            nuevaNoticiaDiv .innerHTML = '';
            nuevaNoticiaDiv.innerHTML = `
            <div class="container contenedorCursos">
                <div class="row tablaContenidosCursos">
                    <div class="col-sm-4 align-items-start"><!-- imagen del curso -->
                        <img class="contenedorImagen" src="${noticia.imagen}">
                    </div>
                    <div class="col-sm-3">
                        <div class="contenedorNombreCurso"><h4>${noticia.titulo}</h4></div>
                    </div>

                    <div class="col-sm-5 custom-align-bottom">
                        <button class="botonCurso botonFiltroActivoCurso btnVerMasNoticia" data-id-noticia="${noticia.id_noticia}">
                            Más información
                        </button>
                    </br>
                        <button class="botonCurso botonFiltroDesactivoCurso btnEliminarNoticia" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-id-noticia="${noticia.id_noticia}">
                            Eliminar
                        </button
                    </div>
                </div>
            </div>
        `;
        contenedorListaNoticias.appendChild(nuevaNoticiaDiv);
        });

        const btnEliminarNoticia = document.querySelectorAll(".btnEliminarNoticia");
        btnEliminarNoticia.forEach(boton => {
            boton.addEventListener("click", function() {
                const idNoticia = boton.dataset.idNoticia;
                eliminarNoticia(idNoticia);
            });
        });

        const btnVerMasCurso = document.querySelectorAll(".btnVerMasNoticia");
        btnVerMasCurso.forEach(boton => {
            boton.addEventListener("click", function() {
                const idNoticia = boton.dataset.idNoticia;
                console.log("boton ver mas con id",idNoticia);
                verMasInformacionNoticia(idNoticia);
            });
        });
    }
}
function listaNoticias(filtro){
    $.ajax({
        type: "GET",
        url: "https://springgcp-402821.uc.r.appspot.com/api/noticias",
        contentType: "application/json",
        crossDomain: true,
        success: function(response, textStatus, xhr) {
            //console.log(response);
            crearListaNoticias(response,filtro);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}
$(document).ready(function () {
    listaNoticias("");
});
