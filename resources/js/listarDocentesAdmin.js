async function getInfoDocente(id) {
    try {
        const response = await $.ajax({
            type: "GET",
            url: "https://springgcp-402821.uc.r.appspot.com/api/docentes/buscar-docente/" + id,
            contentType: "application/json",
            crossDomain: true
        });
        return response;
    } catch (error) {
        throw error;
    }
}

function mostrarModal(id) {
    getInfoDocente(id)
        .then(docente => {
            // Actualizando el contenido del modal con los datos del docente
            $("#img_docente").attr("src", docente.imagen);
            $("#nombre_docente").text(docente.nombre);
            $("#especialidad_docente").text("Especialidad: " + docente.id_especialidad.especialidad);
            $("#correo_docente").text("Correo: " + docente.id_usuario.correo);
            $("#descripcion_docente").text("Descripción: " + docente.descripcion);

            // Mostrar el modal
            $("#modal-Docente").modal("show");
           // console.log("cargo el modal por fin.")
        })
        .catch(error => {
            console.error(error);
        });
}

function crearListaDocentes(docente) {
    const contenedorDocentes = document.getElementById("contenedorDocentes");
    contenedorDocentes.style = "width:100%";

    docente.forEach(usuario => {
        //console.log(usuario)
        const nuevoDocenteDiv = document.createElement("div");
        nuevoDocenteDiv.className = "cuerpoUsuarios";
        nuevoDocenteDiv.style = "margin-top:5px";
        nuevoDocenteDiv.innerHTML = `
            <div class="imagenUsuario"><img src="${usuario.imagen}"></div>
            <div class="nombreDocenteBox">
                <p class="DocenteNombreTxt">${usuario.nombre}</p>
                <p class="DocenteDescripcionTxt">Docente</p>
            </div>
            <button class="BotonEdit" data-bs-toggle="modal" data-bs-target="#modal-DocenteE" data-id-docente="${usuario.id_docente}">
                <div class="BotonEditSymbol">
                    <svg width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 19.3 8.925 L 15.05 4.725 L 16.45 3.325 C 16.833 2.942 17.304 2.75 17.863 2.75 C 18.422 2.75 18.892 2.942 19.275 3.325 L 20.675 4.725 C 21.058 5.108 21.258 5.571 21.275 6.113 C 21.292 6.655 21.108 7.117 20.725 7.5 L 19.3 8.925 Z M 17.85 10.4 L 7.25 21 H 3 V 16.75 L 13.6 6.15 L 17.85 10.4 Z" fill="#1E6DA6" />
                    </svg>
                </div>
                <p class="BotonEditarText">Editar</p>
            </button>
            <button class="BotonVerMas" data-id-docente="${usuario.id_docente}">
                <div class="BotonEditSymbol">
                    <svg width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 6.75 7.5 C 6.75 8.892 7.303 10.228 8.288 11.212 C 9.272 12.197 10.608 12.75 12 12.75 C 13.392 12.75 14.728 12.197 15.712 11.212 C 16.697 10.228 17.25 8.892 17.25 7.5 C 17.25 6.108 16.697 4.772 15.712 3.788 C 14.728 2.803 13.392 2.25 12 2.25 C 10.608 2.25 9.272 2.803 8.288 3.788 C 7.303 4.772 6.75 6.108 6.75 7.5 Z M 19.5 21.75 H 3.75 C 3.551 21.75 3.36 21.671 3.22 21.53 C 3.079 21.39 3 21.199 3 21 V 18.75 C 3 17.755 3.395 16.802 4.098 16.098 C 4.802 15.395 5.755 15 6.75 15 H 17.25 C 18.245 15 19.198 15.395 19.902 16.098 C 20.605 16.802 21 17.755 21 18.75 V 21 C 21 21.199 20.921 21.39 20.78 21.53 C 20.64 21.671 20.449 21.75 20.25 21.75 H 19.5 Z" fill="#1E6DA6" />
                    </svg>
                </div>
                <p class="BotonVerMasText">Ver más</p>
            </button>
            <button type="button" class="BotonDelete" data-bs-toggle="modal" data-bs-target="#modalconfirmacion" data-id-docente="${usuario.id_docente}">
                <div class="BotonEditSymbol">
                    <i class="fa-solid fa-trash"></i>
                </div>
            </button>
        `;
        // Adjuntando el contenedor al DOM, con la lista de docentes
        contenedorDocentes.appendChild(nuevoDocenteDiv);
    });

    const btnVerMas = document.querySelectorAll(".BotonVerMas");
    btnVerMas.forEach(boton => {
        boton.addEventListener("click", function() {
            const idDocente = boton.dataset.idDocente;
            mostrarModal(idDocente);
            console.log("Se hizo clic en el botón Ver más. ID del docente:", idDocente);

        });
    });

    const btnEditar = document.querySelectorAll(".BotonEdit");
    btnEditar.forEach(boton => {
        boton.addEventListener("click", function() {
            const idDocente = boton.dataset.idDocente;
            //mostrarModal(idDocente);
            console.log("Se hizo clic en el botón Editar. ID del docente:", idDocente);
        });
    });

    const btnDelete = document.querySelectorAll(".BotonDelete");
    btnDelete.forEach(boton => {
        boton.addEventListener("click", function() {
            const idDocente = boton.dataset.idDocente;
            //mostrarModal(idDocente);
            console.log("Se hizo clic en el botón Editar. ID del docente:", idDocente);
        });
    });

}

$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "https://springgcp-402821.uc.r.appspot.com/api/docentes/buscar-todos", // Reemplaza con la URL de tu endpoint
        contentType: "application/json",
        crossDomain: true,
        success: function(response, textStatus, xhr) {
            //console.log(response);
            crearListaDocentes(response);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
});
