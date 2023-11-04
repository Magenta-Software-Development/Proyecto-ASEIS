function sweetalert(icon, title, message) {
    $("#btnLogin").removeAttr('disabled');
    $("#indicadorCarga").attr('hidden', true);
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    })
}
$(document).ready(function API() {
    // Deshabilitar el manejo global de errores de jQuery
    $.ajaxSetup({
        global: false
    });
    $("#btnLogin").click(function () {
        // Mostrar el modal de indicador de carga
        $('#modal-indicador-carga').removeAttr('hidden');
        $('#modal-indicador-carga').modal('show');
        $('.modal-backdrop').modal('show');
        $("#indicadorCarga").removeAttr('hidden');
        $("#btnLogin").attr('disabled', true)
        // Datos que deseas enviar en el cuerpo de la solicitud
        var datos = {
            correo: $("#correo").val(),
            password: $("#password").val(),
        };
        // Realizar la solicitud Ajax
        $.ajax({
            type: "POST",
            url: "https://springgcp-402821.uc.r.appspot.com/api/usuarios/login-docente", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(datos),
            success: function (response, textStatus, xhr) {

                //console.log(response);
                let message = response.message
                let status = xhr.status;

                $('#modal-indicador-carga').modal('hide');
                $('#modal-indicador-carga').attr('hidden', true);

                if (status == 200) {

                    sweetalert('success', 'Bienvenido', message);

                    console.log(response);

                    let id = response.usuario.id_usuario;
                    let token = response.token;

                    localStorage.setItem('id', id);
                    localStorage.setItem('token', token);
                    localStorage.setItem('rol', response.usuario.rol["roles"]);

                    sessionStorage.setItem('id', id);
                    sessionStorage.setItem('token', token);
                    sessionStorage.setItem('rol', response.usuario.rol["roles"]);

                    console.log(sessionStorage.getItem('id'));
                    console.log(sessionStorage.getItem('token'));
                    console.log(sessionStorage.getItem('rol'));

                    let dataNew = {
                        rol: response.usuario.rol["roles"],
                        id: id,
                        token: token
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "/login/Verify",
                        data: dataNew,
                        success: function (response) {
                            console.log(response);

                            //Espera 3 segundos y redirecciona
                            setTimeout(function () {

                                if (response == "Admin") {
                                    console.log("Admin");
                                    window.location.href = "index";

                                } else if (response == "Docente") { //Docente (OJO)

                                    console.log("Docente");
                                    sweetalert('success', "Bienvenido Docente");
                                    window.location.href = "indexD";

                                } else if (response == "Estudiante") {

                                    console.log("Estudiante");
                                    sweetalert('error', message, "No tienes permisos para ingresar a esta pagina");
                                    window.location.href = "login";
                                }
                                else {

                                    console.log("Error");
                                    window.location.href = "login";
                                }
                            }, 3000);
                        },
                        error: function (xhr, textStatus, errorThrown) {
                            console.log(xhr);
                        }
                    });

                    /*
                        $.ajax({
                            type: "POST",
                            url: "/login/Verify",
                            data: {
                                rol: rol,
                                id: id,
                                token: token
                            },
                            success: function (response) {
    
                                console.log(response);
    
                                setTimeout(function () {
                                    if (sessionStorage.getItem('rol') == "Admin") {
                                        window.location.href = "index";
                                    }
                                    else if (sessionStorage.getItem('rol') == "Docente") { //Docente (OJO)
                                        window.location.href = "indexD";
                                    }
                                    else if (sessionStorage.getItem('rol') == "Estudiante") {
                                        window.location.href = "login";
                                    }
                                }, 3000);
                            },
                            error: function (xhr, textStatus, errorThrown) {
                                console.log(xhr);
                            }
    
    
                        });*/



                } else if (status === 202) {

                    if (message == "No tienes permisos para ingresar") {
                        sweetalert('error', "Estudiante", message);

                        $('#modal-indicador-carga').modal('hide');
                        $('#modal-indicador-carga').attr('hidden', true);
                        $('.modal-backdrop').attr('hidden', true);

                    } else {
                        sweetalert('success', 'Vamos', message);

                        $('#modal-indicador-carga').modal('hide');
                        $('#modal-indicador-carga').attr('hidden', true);
                        $('.modal-backdrop').attr('hidden', true);
                    }
                }

            },
            error: function (xhr, textStatus, errorThrown) {
                let response = xhr.responseJSON
                let message = response.message
                // Ocultar el modal de indicador de carga
                $('#modal-indicador-carga').modal('hide');
                $('#modal-indicador-carga').attr('hidden', true);
                $('.modal-backdrop').attr('hidden', true);

                if (xhr.status == 500) {
                    sweetalert('error', message, "Error del credenciales");
                }
            }

        });
    });
});

/*function verifyLogin(data = []) {

    let rol = data.rol;
    let id = localStorage.getItem('id');
    let token = localStorage.getItem('token');
    let email = data.username;
    let password = data.password;

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
            email: email,
            password: password,
            rol: rol,
            id: id,
            token: token
        },
        success: function (response) {
            console.log(response);


            //Espera 3 segundos y redirecciona
            setTimeout(function () {
                if (response.rol == 1) {
                    window.location.href = "index";
                } else if (response.rol == 2) { //Docente (OJO)
                    sweetalert('success', "Bienvenido Docente");
                    window.location.href = "indexD";
                } else if (response.rol == 3) {
                    sweetalert('error', message, "No tienes permisos para ingresar a esta pagina");
                    window.location.href = "login";
                }
                else {
                    window.location.href = "login";
                }
            }, 3000);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(xhr);
        }
    });

}*/