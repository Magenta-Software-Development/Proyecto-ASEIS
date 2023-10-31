function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    })
}
$(document).ready(function () {
    // Deshabilitar el manejo global de errores de jQuery
    $.ajaxSetup({
        global: false
    });

    $("#btnLogin").click(function () {

        // Datos que deseas enviar en el cuerpo de la solicitud
        var datos = {
            correo: $("#correo").val(),
            password: $("#password").val(),
        };

        // Realizar la solicitud Ajax
        $.ajax({
            type: "POST",
            url: "https://springgcp-402821.uc.r.appspot.com/api/usuarios/login", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(datos),
            success: function (response, textStatus, xhr) {
                console.log(response);
                let message = response.message
                let status = xhr.status;
                if (status == 200) {
                    sweetalert('success', 'Bienvenido', message);
                    let id = response.usuario.id_usuario;
                    let token = response.token;
                    console.log(token);
                    console.log(id);
                    console.log(response.usuario.rol);
                    localStorage.setItem('id', id);
                    localStorage.setItem('token', token);

                    let dataNew = {
                        username: datos.correo,
                        password: datos.password,
                        rol: response.usuario.rol,
                    }

                    //verificamos los datos y los enviamos al controller
                    verifyLogin(dataNew);
                } else if (status === 202) {
                    sweetalert('success', 'Vamos', message);

                    let dataNew = {
                        username: datos.correo,
                        password: datos.password,
                        rol: "ADMINISTRADOR",
                    }

                    verifyLogin(dataNew);
                }

            },
            error: function (xhr, textStatus, errorThrown) {
                let response = xhr.responseJSON
                let message = response.message
                if (xhr.status == 500) {
                    sweetalert('error', message, "Error del credenciales");
                }
            }
        });
    });
});

function verifyLogin(data) {
    let rol = data.rol;
    if (rol == 'ADMINISTRADOR') {
        $("#rol").val("ADMINISTRADOR")
    }

    if (rol == 'USUARIO') {
        $("#rol").val("USUARIO")
    }

    //Hace la peticion al controller y ejecuta el metodo
    //console.log(data);

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
        type: "POST",
        url: "/login/Verify",
        data: {
            email: data.username,
            password: data.password,
            rol: data.rol,
        },
        success: function (response) {
            console.log(response);            
        },
        error: function (xhr, textStatus, errorThrown) {
            sweetalert('error', 'Error', 'No se pudo iniciar sesion');
        }
    });

}