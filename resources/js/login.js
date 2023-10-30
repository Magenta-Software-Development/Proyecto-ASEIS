document.addEventListener('DOMContentLoaded', function() {
    const modalOverlay = document.querySelector('.modal-overlay');
    modalOverlay.addEventListener('click', function(event) {
        event.stopPropagation(); // Evita que el clic se propague al modal
    });
});


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
            url: "https://springgcp-402821.uc.r.appspot.com/api/usuarios/login", // Reemplaza con la URL de tu endpoint
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(datos),
            success: function(response,textStatus,xhr) {
                console.log(response);
                let message = response.message
                let status = xhr.status;
                $('#modal-indicador-carga').modal('hide');
                $('#modal-indicador-carga').attr('hidden', true);
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
                // Ocultar el modal de indicador de carga
                $('#modal-indicador-carga').modal('hide');
                $('#modal-indicador-carga').attr('hidden', true); 
                $('.modal-backdrop').attr('hidden',true);
               
                if (xhr.status == 500) {
                    sweetalert('error',message, "Error del credenciales");
                }
            }
            
        });
    });
});