function sweetalert(icon, title, message) {
    $("#btnLogin").removeAttr('disabled');
    $("#indicadorCarga").attr('hidden', true);
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
            url: "https://springgcp-402821.uc.r.appspot.com/api/usuarios/login", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(datos),
            success: function(response,textStatus,xhr) {
                console.log(response);
                let message = response.message
                let status = xhr.status;
                if(status == 200){
                    sweetalert('success', 'Bienvenido', message);
                    let id = response.usuario.id_usuario;
                    let token = response.token;
                    console.log(token);
                    localStorage.setItem('id', id);
                    localStorage.setItem('token', token);
                    //Redireccionar a la pagina de inicio de forma temporal
                    window.location.href = `index`
                }else if(status === 202){
                    sweetalert('success', 'Vamos', message);
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