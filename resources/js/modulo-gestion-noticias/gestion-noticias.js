var urlImagenDeFirebase = '';

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
        // if (result.isConfirmed) {
           
        // }
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


function crearNoticia(contenidoTextEditor,urlImagen,titulo){
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
    console.log(JSON.stringify(data));
    // Realizamos una solicitud AJAX utilizando jQuery
    $.ajax({
        url: 'https://springgcp-402821.uc.r.appspot.com/api/noticias/crear',
        type: 'POST',
        contentType: "application/json",
        crossDomain: true,
        data: JSON.stringify(data),
        success: function(response, textStatus, xhr) {
            // Si la solicitud fue exitosa aca...
            if(xhr.status == 201){//Se encuentra el correo del usuario, con rol invitado, procedemos a activar su cuenta
                urlImagenDeFirebase = '';
                sweetalert('success','Creado con exito!',response.message);
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

document.getElementById('botonSubir').addEventListener('click', function() {
    document.getElementById('imageInput').click();
});

document.getElementById('imageInput').addEventListener('change', function(event) {
        //--------------------- Subir la imagen -------------------------------------------------------------------
        var fileInput = document.getElementById("imageInput");
        var imagen = fileInput.files[0];

        if (imagen) {
            var formData = new FormData();
            formData.append("file", imagen);

            // Realizar la solicitud POST para subir la imagen al servidor
            $.ajax({
                type: "POST",
                url: "https://springgcp-402821.uc.r.appspot.com/api/subir-archivo",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // La variable "response" debería contener la URL de la imagen en Firebase
                    urlImagenDeFirebase = response.message;
                },
                error: function(error) {
                    console.error("Error al subir la imagen:", error);
                }
            });
        } else {
            console.error("No se ha seleccionado una imagen para subir.");
        }
});

document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#contentDescripcion'))
        .then(editor => {
            // El editor está listo y se puede acceder a través del parámetro 'editor'
            function obtenerContenido() {
                console.log("Funciona correctamente");
                const contenido = editor.getData();
                return contenido;
            }

            const botonObtenerContenido = document.getElementById('btnCrearNoticias');
            botonObtenerContenido.addEventListener('click', function(){
                const contenidoTextEditor = obtenerContenido();
                const urlImagen = urlImagenDeFirebase;
                const inputT = $("#inputT").val();
                $("#inputT").val('');
                editor.setData('');
                // Validando si los valores no están vacíos
                if (contenidoTextEditor && urlImagen && inputT) {
                    crearNoticia(contenidoTextEditor,urlImagen,inputT);
                } else {
                    // Al menos uno de los valores si está vacío, muestra un mensaje de error
                    //console.error("Por favor, completa todos los campos antes de enviar la noticia.");
                    sweetalert('error','Campos vacios','Antes de crear una noticia, debe llenar todos los campos que se le piden.')
                }
            });
        })
        .catch(error => {
            console.error(error);
        });
});



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

document.getElementById("imageInput").addEventListener("change", showFileName);

