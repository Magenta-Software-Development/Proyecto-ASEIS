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

    $("#btnLogin").click(function() {

        // Datos que deseas enviar en el cuerpo de la solicitud
        var datos = {
            correo: "ga19014@ues.edu.sv",
            password: "Minerva.23"
        };

        // Realizar la solicitud Ajax
        $.ajax({
            type: "POST",
            url: "https://springgcp-402821.uc.r.appspot.com/api/usuarios/login", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(datos),
            success: function(response,textStatus,xhr) {
                console.log(response);
                console.log(textStatus);
                console.log(xhr.getAllResponseHeaders());
                let message = response.message
                if(xhr.status == 200){
                    sweetalert('success', 'Bienvenido', message);
                    let id = response.usuario.id_usurio;
                    localStorage.setItem('id', id);

                    //Redireccionar a la pagina de inicio
                    window.location.href = `index`

                    //let token = xhr.getResponseHeader('Authorization')
                    //localStorage.setItem('token', token)
                    //window.location.href = `{{ route('app_index_usuarios') }}`
                }
                
            },
            error: function(xhr, textStatus, errorThrown) {
                let response = xhr.responseJSON
                let message = response.message
                if (xhr.status == 500) {
                    sweetalert('error',message, "Error del credenciales");
                }
            }
        });
    });
});