@extends('layouts.app')
@section('content')
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
@endsection

@section('scripts')
@vite('js/crearUsuariosAdmin.js')
@endsection