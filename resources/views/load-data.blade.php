@extends('Layouts.app')
@section('title', 'Cargar datos')
@section('scripts')
@vite(['resources/js/load-file.js'])
@endsection
@section('content')
<div class="h-screen flex justify-center bg-blue-500">
    <div class="w-3/5 mt-7 bg-gray-50/30 rounded-md">
        <form class="p-10" action="https://springgcp-402821.uc.r.appspot.com/api/leer" method="POST" enctype="multipart/form-data">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Subir archivo</label>

            <input class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 
            focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="filex" accept=".xlsx">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">.xlsx</p>

            <button type="submit" class="mt-4 bg-green-500 text-white p-2 pr-4 pl-4  rounded-lg">Enviar</button>
        </form>

        <center>
            <img src="images/indicacion_xls.png" alt="Image">
            <br>
            <p>El campo rol debe ser 4 que significa que es invitado, el correo, la contraseña por defecto y el estado en 0 que sea inactivo</p>
        </center>
    </div>
</div>
@endsection