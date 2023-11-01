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
    $("#btnLogin").click(function() {
        // Mostrar el modal de indicador de carga
        $('#modal-indicador-carga').removeAttr('hidden');
        $('#modal-indicador-carga').modal('show');
        $('.modal-backdrop').modal('show');
        $("#indicadorCarga").removeAttr('hidden');
        $("#btnLogin").attr('disabled',true)
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
                if(status == 200){
                    sweetalert('success', 'Bienvenido', message);
                    let id = response.usuario.id_usuario;
                    let token = response.token;

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
                    $('#modal-indicador-carga').modal('hide');
                    $('#modal-indicador-carga').attr('hidden', true); 
                    $('.modal-backdrop').attr('hidden',true);
                }

            },
            error: function (xhr, textStatus, errorThrown) {
                let response = xhr.responseJSON
                let message = response.message
                // Ocultar el modal de indicador de carga
                $('#modal-indicador-carga').modal('hide');
                $('#modal-indicador-carga').attr('hidden', true); 
                $('.modal-backdrop').attr('hidden',true);
               
                if (xhr.status == 500) {
                    sweetalert('error', message, "Error del credenciales");
                }
            }
            
        });
    });
});

function verifyLogin(data = []) {

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
            //console.log(response);

            //Espera 3 segundos y redirecciona
            setTimeout(function () {
                if (response.rol == 'Docente') {
                    window.location.href = "index";
                } else if (response.rol == 'Administrador') {
                    window.location.href = "indexD";
                } else if (response.rol == 'Estudiante') {
                    window.location.href = "login";
                }
                else {
                    window.location.href = "login";
                }
            }, 2000);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(xhr);
        }
    });

}