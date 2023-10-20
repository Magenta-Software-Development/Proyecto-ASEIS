<!-- En el encabezado de tu vista -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

<!-- Antes del cierre de la etiqueta </body> -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Mostrar Información de Usuario</title>

   <!-- Incluye los estilos de Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <!-- Barra de navegación Bootstrap -->
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Mi Aplicación</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Acerca de</a>
            </li>
         </ul>
      </div>
   </nav>

   <!-- Contenedor principal -->
   <div class="container mt-4">
      <h1>Información del Usuario</h1>
      <div class="card">
         <div class="card-body">
            <h5 class="card-title">Nombre del Usuario</h5>
            <p class="card-text">Información adicional sobre el usuario.</p>
            <a href="#" class="btn btn-primary">Editar Usuario</a>
         </div>
      </div>
   </div>

   <!-- Incluye los scripts de Bootstrap y jQuery (necesario para algunos componentes de Bootstrap) -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
