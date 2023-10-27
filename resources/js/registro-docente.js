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
            url: "https://springgcp-402821.uc.r.appspot.com/api/docentes/resgistrar", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(id),
            success: function (response, textStatus, xhr) {
                window.location.href = `login`
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
            url: "https://springgcp-402821.uc.r.appspot.com/api/usuarios/findByCorreo", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(datos),
            success: function (response, textStatus, xhr) {
                let status = xhr.status;
                let message = response.message;
                if (status == 200) {
                    console.log(response);
                    sweetalert("success", "Bienvenido", message);
                    let id = response.usuario.id_usuario;
                    registrarDocente({id_usuario: id});
                } else if (status == 202) {
                    sweetalert(
                        "success",
                        "Vuelve al inicio de sesion 😁",
                        message
                    );
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
});
