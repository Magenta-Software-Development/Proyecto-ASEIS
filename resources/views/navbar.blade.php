<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<div style="width: 100%; height: 100%; position: relative;">

    <!--Barra superior-->
    <div style="width: 100%; height: 81px; padding-top: 9px; padding-bottom: 9px; padding-left: 60px; padding-right: 1247px; left: 0px; top: 0px; position: absolute; background: white; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.05); justify-content: flex-start; align-items: center; display: inline-flex">
        <a href="/"><img style="width: 133px; height: 63px"src="imgLogos/LogoASEISNEWSLETRAS.png" /></a>
    </div>

    <!--Cuerpo de la pagina-->
    <div style="width: 78%; height: 850px; left: 393px; top: 97px; position: absolute; background: white; border-radius: 16px; overflow: hidden">
    @yield('content')
    </div>

    <!--Barra lateral-->
    <div style="padding-top: 55px; padding-bottom: 50px; padding-left: 40px; padding-right: 44px; left: 0px; top: 81px; position: absolute; background: white; flex-direction: column; justify-content: flex-end; align-items: flex-start; gap: 370px; display: inline-flex">
        <div style="align-self: stretch; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 21px; display: inline-flex">
            <a href="MostrarInfo">
                <div style="width: 287px; padding: 20px; background: #1E6DA6; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: white">
                Gestión de usuarios
            </div>
            </a>
            <a href="#">
                <div style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                Gestión de categorías
            </div>
            </a><a href="#">
                <div style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                Gestión de cursos
            </div>
            </a><a href="#">
                <div style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                Cursos disponibles
            </div>
            </a><a href="#">
                <div style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                Cursos publicados
            </div>
            </a>

            </a><a href="#">
                <div style="width: 287px; padding: 20px; background: white; border-radius: 16px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex; color: #1E6DA6">
                Cerrar sesión
            </div>
            </a>

    </div>
</div>
</body>
</html>
