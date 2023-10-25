
document.getElementById("btnCrear").addEventListener("click", function() {

    var email = document.getElementById("email").value;
    var password = document.getElementById("passworddd").value;

    //Se valida que los campos no estén vacios
    if (email.trim() === '' || password.trim() === '') {
        alert("Los campos están vacios");
        return;
    }

    // Para que el correo contenga una arroba
    if (email.indexOf('@') === -1) {
        alert("El correo debe contener una arroba");
        return;
    }

    // Se valida la contraseña 
    if (password.length < 6 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/\d/.test(password)) {
        alert("La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número");
        return;
    }
    
    alert("Formulario válido, puedes continuar.");
});
