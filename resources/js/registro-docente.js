
function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    });
}


$(document).ready(function () {

    // Deshabilitar el manejo global de errores de jQuery
    $.ajaxSetup({
        global: false,
    });
    async function registrarDocente(id) {
        $.ajax({
            type: "POST",
            url: "https://springgcp-402821.uc.r.appspot.com/api/docentes/registrar", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(id),
            success: function (response, textStatus, xhr) {
                localStorage.removeItem('idProvicional');
                localStorage.removeItem('mensajeProvicional');
                //window.location.href = `login`
            },
            error: function (xhr, textStatus, errorThrown) {
                let response = xhr.responseJSON;
                let message = response.message;
                if (xhr.status == 500) {
                    sweetalert("error", message, "Lo sentimos");
                }
            },
        });
    }

    async function eliminarCodigo(codigoEliminar) {
        let idProvicional = localStorage.getItem('idProvicional');
        let mensajeProvicional = localStorage.getItem('mensajeProvicional');
        let dataIdProvicional = {
            id_usuario: idProvicional
        }
        let dataCodigoEliminar = {
            codigo: codigoEliminar
        }
        $.ajax({
            type: "POST",
            url: "https://springgcp-402821.uc.r.appspot.com/api/codigos/eliminar", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(dataCodigoEliminar),
            success: function (response, textStatus, xhr) {
                if (localStorage.getItem("activo")) {
                    console.log("Esta siendo activado, codigo eliminado")
                    return;
                }
                sweetalert('success', 'Bienvenido', mensajeProvicional);
                console.log(idProvicional);
                registrarDocente(dataIdProvicional);
            },
            error: function (xhr, textStatus, errorThrown) {
                let response = xhr.responseJSON;
                let message = response.message;
                if (xhr.status == 500) {
                    sweetalert("error", message, "Lo sentimos");
                }
            },
        });
    }

    async function verificarCodigo(codigoAVerificar) {
        let { codigo } = codigoAVerificar;
        $.ajax({
            type: "POST",
            url: "https://springgcp-402821.uc.r.appspot.com/api/codigos/verificar", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(codigoAVerificar),
            success: function (response, textStatus, xhr) {
                if (xhr.status == 200) {
                    eliminarCodigo(codigo);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                let response = xhr.responseJSON;
                let message = response.message;
                if (xhr.status == 500) {
                    sweetalert("error", message, "Lo sentimos");
                }
            },
        });
    }

    $("#btnFindByCorreo").click(function () {
        // Datos que deseas enviar en el cuerpo de la solicitud
        var datos = {
            correo: $("#correo").val(),
        };

        // Realizar la solicitud Ajax
        $.ajax({
            type: "POST",
            url: "https://springgcp-402821.uc.r.appspot.com/api/usuarios/findByCorreo-docente", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(datos),
            success: function (response, textStatus, xhr) {
                let status = xhr.status;
                let message = response.message;
                console.log(xhr);
                if (status === 200) {
                    let id = response.usuario.id_usuario;
                    console.log(response);
                    localStorage.setItem('mensajeProvicional', message);
                    localStorage.setItem('idProvicional', id);
                    let inputCodigo = $("#codigo").val();
                    let dataCodigo = {
                        codigo: inputCodigo
                    };
                    verificarCodigo(dataCodigo);

                } else if (status === 202) {
                    sweetalert(
                        "success",
                        "Vuelve al inicio de sesion 😁",
                        message,
                    );
                    setTimeout(function () {
                    window.location.href = "login";
                    },1000);
                } else if (status === 201) {
                    let id = response.usuario.id_usuario;
                    localStorage.setItem('idUsuario', id);
                    localStorage.setItem('activo', true);
                    sweetalertquestion('question', 'Quieres volver a activar tu cuenta?', message, 'Estoy seguro', 'success', 'Cuenta Activada', 'Tu cuenta ha sido activada con exito!')
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                let response = xhr.responseJSON;
                let message = response.message;
                if (xhr.status == 500) {
                    sweetalert("error", message, "Lo sentimos");
                }
            },
        });
    });

    function sweetalertquestion(icon, title, message, messageConfirmButton, icon2, title2, message2) {
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
                let inputCodigo = $("#codigo").val();
                let dataCodigo = {
                    codigo: inputCodigo
                };
                verificarCodigo(dataCodigo);
                let idUser = localStorage.getItem('idUsuario');
                $.ajax({
                    type: "PUT",
                    url: "https://springgcp-402821.uc.r.appspot.com/api/usuarios/activar/" + idUser, // Reemplaza con la URL de tu endpoint
                    contentType: "application/json",
                    crossDomain: true,
                    success: function (response, textStatus, xhr) {
                        localStorage.removeItem('idUsuario');
                        sweetalert(icon2, title2, message2);
                    },
                    error: function (xhr, textStatus, errorThrown) {

                    },
                });
            }
        })
    }


});
