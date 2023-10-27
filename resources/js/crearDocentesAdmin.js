function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    })
}

$(document).ready(function () {
    $.ajaxSetup({
        global: false
    });
    
    //Le agrego un evento de clic al boton crear docente, si se da clic se ejecuta la siguiente funcion
    $('#btnCrearDocente').click(function() {
        // Obtengo el valor del correo electrónico del input
       var data = {
            correo: $('#emailDocente').val(),
        };
        console.log(JSON.stringify(data));
        // Realizamos una solicitud AJAX utilizando jQuery
        $.ajax({
            url: 'https://springgcp-402821.uc.r.appspot.com/api/usuarios/findByCorreo', 
            type: 'POST', 
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(data), 
            success: function(response, textStatus, xhr) {
                // Si la solicitud fue exitosa...
                //console.log(response);;
                console.log(response.message);
            },
            error: function(error) {
                // Ocurrió un error en la solicitud...
                console.error('Error en la solicitud AJAX:', error);
                if (response.status == 500) {
                    sweetalert('ERROR',response.message, "Bye");
                }
            }
        });
    });
});
