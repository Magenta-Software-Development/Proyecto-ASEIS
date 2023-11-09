var urlImagenDeFirebase = '';
let arregloNoticias = [];
let editorInstance;

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
function obtenerFechaActual() {
    const fechaActual = new Date();
    const año = fechaActual.getFullYear();
    const mes = fechaActual.getMonth() + 1;
    const dia = fechaActual.getDate();
    // Formateando la fecha como "año-mes-día"
    return `${año}-${mes < 10 ? '0' : ''}${mes}-${dia < 10 ? '0' : ''}${dia}`;
}
function actualizarNoticia(contenidoTextEditor,urlImagen,titulo,idNoticia){
    const idUsuario = localStorage.getItem('id');
    const fechaActual = obtenerFechaActual();
    console.log(idUsuario);
    console.log(fechaActual);
    var data = {
        titulo: titulo,
        descripcion: contenidoTextEditor,
        fecha: fechaActual,
        imagen: urlImagen,
        id_usuario: {
            id_usuario: idUsuario
        }
    };
    //console.log(JSON.stringify(data));
    // Realizamos una solicitud AJAX utilizando jQuery
    $.ajax({
        url: 'https://springgcp-402821.uc.r.appspot.com/api/noticias/actualizar/'+idNoticia,
        type: 'PUT',
        contentType: "application/json",
        crossDomain: true,
        data: JSON.stringify(data),
        success: function(response, textStatus, xhr) {
            // Si la solicitud fue exitosa aca...
            if(xhr.status == 201){//Se encuentra el correo del usuario, con rol invitado, procedemos a activar su cuenta
                urlImagenDeFirebase = '';
                $("#modalEditar").modal("hide");
                sweetalert('success','Actualizado con exito!',response.message);
                obtenerNoticiasDelServidor();
            }
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
function verMasInformacionNoticia(id) {
    const cuerpoNoticia = document.getElementById("cuerpoDeNoticia");
    const idNoticia = parseInt(id);
    const noticiaEncontrada = arregloNoticias.find(noticia => noticia.id_noticia === idNoticia);
    if (noticiaEncontrada) {
        $("#txtEncabezadoNoticia").text(noticiaEncontrada.titulo);
        $('#imgNoticia').attr('src', noticiaEncontrada.imagen);
        cuerpoNoticia.innerHTML = `
            ${noticiaEncontrada.descripcion}
        `;
        $("#btnEditarNoticia").attr("data-idNoticia", idNoticia);
        $("#modalMasInfo").modal("show");
    } else {
        console.error("Noticia no encontrada en el arreglo local.");
    }
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
                obtenerNoticiasDelServidor();
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    })
}

document.getElementById('botonSubir').addEventListener('click', function() {
    document.getElementById('imageInput').click();
});

async function subirImagen() {
    return new Promise((resolve, reject) => {
        var fileInput = document.getElementById("imageInput");
        var imagen = fileInput.files[0];

        if (imagen) {
            var formData = new FormData();
            formData.append("file", imagen);

            // Realizar la solicitud POST para subir la imagen al servidor usando async/await
            $.ajax({
                type: "POST",
                url: "https://springgcp-402821.uc.r.appspot.com/api/subir-archivo",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // La variable "response" debería contener la URL de la imagen en Firebase
                    resolve(response.message); // Resuelve la promesa con el URL de la imagen
                },
                error: function(error) {
                    reject("Error al subir la imagen: " + error); // Rechaza la promesa con el mensaje de error
                }
            });
        } else {
            reject("No se ha seleccionado una imagen para subir."); // Rechaza la promesa si no se selecciona ninguna imagen
        }
    });
}
// Uso de la función asíncrona
document.getElementById('imageInput').addEventListener('change', async function(event) {
    try {
        // Espera a que se suba la imagen y obtén el URL resultante
        urlImagenDeFirebase = await subirImagen();
        // Usa el URL de la imagen como sea necesario
    } catch (error) {
        // Maneja los errores que puedan ocurrir durante la subida de la imagen
        console.error(error);
    }
});

$("#btnEditarNoticia").off("click").on("click", function (e) {
    e.preventDefault();
    // Destruye la instancia anterior del editor si existe
    if (editorInstance) {
        editorInstance.destroy().then(() => {
            // Crea una nueva instancia de CKEditor después de destruir la instancia anterior
            ClassicEditor.create(document.querySelector('#contentDescripcion'))
                .then(editor => {
                    editorInstance = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    } else {
        // Si no hay instancia anterior del editor, simplemente crea una nueva instancia
        ClassicEditor.create(document.querySelector('#contentDescripcion'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });
    }

    const idNoticia = $(this).attr("data-idNoticia");
    obtenerNoticiaPorId(idNoticia)
        .then(noticia => {
            $("#inputT").val(noticia.noticia.titulo);
            editorInstance.setData(noticia.noticia.descripcion);
        })
        .catch(error => {
            console.error(error);
        });

    const botonObtenerContenido = document.getElementById('btnActualizarNoticia');
    botonObtenerContenido.addEventListener('click', async function(){
        try {
            const contenidoTextEditor = editorInstance.getData();
            const urlImagen = await subirImagen();
            const inputT = $("#inputT").val();

            // Validando si los valores no están vacíos
            if (contenidoTextEditor && urlImagen && inputT) {
                $("#inputT").val('');
                editorInstance.setData('');
                actualizarNoticia(contenidoTextEditor, urlImagen, inputT, idNoticia);
            } else {
                // Al menos uno de los valores sí está vacío, muestra un mensaje de error
                sweetalert('error', 'Campos vacíos', 'Antes de crear una noticia, debe llenar todos los campos que se le piden.');
            }
        } catch (error) {
            // Maneja cualquier error que pueda ocurrir durante la subida de la imagen
            console.error(error);
            sweetalert('error', 'Error al subir la imagen', 'Ocurrió un error al subir la imagen. Por favor, inténtalo de nuevo más tarde.');
        }
    });
});

document.getElementById("imageInput").addEventListener("change", showFileName);

function showFileName() {
    const input = document.getElementById("imageInput");
    const fileNameElement = document.getElementById("filename");

    if (input.files.length > 0) {
        const fileName = input.files[0].name;
        fileNameElement.value = fileName;
    } else {
        fileNameElement.value = "";
    }
}
function obtenerNoticiasDelServidor() {
    var idUsuarioNoticia = localStorage.getItem("id");
    // Hacer la solicitud al servidor para obtener las noticias del usuario
    $.ajax({
        type: "GET",
        url: `https://springgcp-402821.uc.r.appspot.com/api/noticias/usuario/${idUsuarioNoticia}`,
        contentType: "application/json",
        crossDomain: true,
        success: function(response, textStatus, xhr) {
            // Almacenar los datos en el arreglo local listaNoticias
            arregloNoticias = response.noticias;
            // Llamar a la función para mostrar las noticias en la página
            crearListaNoticias(arregloNoticias);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}
function buscarNoticias(filtro) {
    // Realizar la búsqueda en el arreglo local listaNoticias
    const resultados = arregloNoticias.filter(noticia => {
        // Aplicar lógica de filtrado según el filtro proporcionado por el usuario
        // Por ejemplo, buscar en el título de la noticia
        return noticia.titulo.toLowerCase().includes(filtro.toLowerCase());
    });

    // Llamar a la función para mostrar los resultados en la página
    crearListaNoticias(resultados);
}
function crearListaNoticias(noticias){
    console.log(noticias);
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
                //console.log("boton ver mas con id",idNoticia);
                verMasInformacionNoticia(idNoticia);
            });
        });
    }
}
const inputBusqueda = document.getElementById("inputBusqueda");
inputBusqueda.addEventListener('input', function() {
    const valorBusqueda = inputBusqueda.value;
    buscarNoticias(valorBusqueda);
});

$(document).ready(function () {
    obtenerNoticiasDelServidor();
});
