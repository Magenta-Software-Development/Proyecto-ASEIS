//funcion para crear alertas personalizadas estilos sweet.
function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    })
}

function validandoDatos(){
    let email = document.getElementById("emailEstudiante").value;
    let password = document.getElementById("passwordEstudiante").value;
    //Se valida que los campos no estén vacios
    if (email.trim() === '' || password.trim() === '') {
          sweetalert("warning","Los campos están vacios", "Por favor, llene adecuadamente los campos que se le piden.");
        return(false);
    }

    // Se valida el formato del correo electrónico usando expresiones regulares, tiene que ser terminacxion @ues.edu.sv
    var emailRegex = /^[a-zA-Z0-9._%+-]+@ues\.edu\.sv$/;
    if (!emailRegex.test(email)) {
        sweetalert("warning","Los campos están vacios", "Por favor, llene adecuadamente los campos que se le piden.");
        //alert("El correo debe ser de la forma: usuario@ues.edu.sv");
        return false;
    }

    // Se valida la contraseña del input
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
    if (!passwordRegex.test(password)) {
        sweetalert("warning","Contraseña Incorrecta","La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número");
        return false;
    }
    ///alert("Formulario válido, puedes continuar.");
    return true;
        
}

$(document).ready(function () {
    $.ajaxSetup({
        global: false
    });
    
    //Le agrego un evento de clic al boton crear docente, si se da clic se ejecuta la siguiente funcion
    $('#btnCrearEstudiante').click(function() {
        // Obtengo el valor del correo electrónico del input
        if(validandoDatos()){
            var data = {
                correo: $('#emailEstudiante').val(),
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
                    // Si la solicitud fue exitosa aca...
                    //console.log(response);
                    console.log(response.message);
                    console.log(xhr.status);
                    if(xhr.status == 200){//Se encuentra el correo del usuario, con rol invitado, procedemos a activar su cuenta
                        console.log(response);
                        let id_usuario = response.usuario.id_usuario;
                        console.log(id_usuario);
                    }
                    else if(xhr.status == 202){ //Estado de respyuesta = aceptado, el usuario ya posee una cuenta
                        sweetalert('error',"Ya posees una cuenta",response.message);
                    }
                },
                error: function(error) {
                    // Ocurrió un error en la solicitud, no encontro correo...
                    console.error('Error en la solicitud AJAX:', error);
                    //dentro del objeto error se encuentra el mensaje de eror y codigo de estado...
                    if (error.status == 500) {
                        sweetalert('error', "Error, no se encontro tu correo",error.responseJSON.message);
                    }
                }
            });
        } // fin del condicional para evaluar que los datos esten bien, antes de enviar peticion a la API.
    });
});
