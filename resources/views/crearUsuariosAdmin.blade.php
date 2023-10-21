<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Crear Usuarios Admin</title>
</head>

<body>
    <div class="container">
        <form class="formulario-CrearUsuarioAdmin">
            <div class="input-container">
                <label for="email">Correo Electrónico</label>
                <input class="borde" type="email" id="email" name="email" required>
            </div>
            <div class="input-container">
                <label for="password">Contraseña</label>
                <input type="password" id="passworddd" name="password" required>
            </div>
            <div class="button-container">
                <button type="button" class="btn-Cancelar button-common" id="btn">Cancelar</button>
                <button type="button" class="btn-Crear button-common" id="btnCrear">Crear</button>
            </div>
        </form>
    </div>
</body>
</html>

<script>
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

</script>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #00dbd0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 0 10px rgba(97, 16, 16, 0.2);
        text-align: center;
        width: 894px;
        height: 527px; 
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .formulario-CrearUsuarioAdmin{
        background-color: #ffffff;
        max-width: 668px;
        height: 300px;
        margin: 0 auto;
        transition: right 0.7s ease-in-out;
    }

    .input-container {
        margin: 10px 0;
        text-align: left;
    }

    label {
        color: #000000;
        border-radius: 10px 10px 0 0;
        display: inline-block;
        padding: 5px;
        margin-bottom: 5px;
        font-family: Inter, sans-serif;
        font-size: 20px;
        font-weight: 600;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        width: 181px;
        height: 24px;
    }

    input[type="email"],
    input[type="password"] {
        height: 46px;
        width: 644px;
        padding: 5px;
        border-radius: 16px;
        border: 2px solid #797979;
        transition: border-color 0.3s;
        font-size: 18px; /*Esta linea es para el tamaño de la letra dentro del input */
    }

    .button-container {
        margin: 100px 0;
        align-items: center;
        justify-content: center;
    }

    button {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .button-common{
        width: 163px;
        height: 56px;
        top: 441px;
        padding: 16px;
        border-radius: 16px;
        gap: 10px;
        font-family: Inter, sans-serif;
        font-size: 20px;
        font-weight: 600;
        line-height: 24px;
        text-align: center;
    }
    .btn-Cancelar {
        background-color: #CECECE;
        color:#000000;
        margin-right: 60px; 
    }

    .btn-Crear {
        background-color: #1F76BD;
        color: #FFFFFF;
    }

</style>