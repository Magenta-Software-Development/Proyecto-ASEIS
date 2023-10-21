@extends('Layouts.app')
@section('title', 'Mostrar información')
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@endsection
@section('css')
@vite('resources/css/informacion.css')
@vite('resources/css/crearUsuarioAdminStyle.css')
@vite('resources/css/index-usuarios.css')
@endsection
@section('content')

<div class="gestion-de-usuarios-box_box_88698871box_94119796212762x">
    <div class="gestion-de-usuarios-box_88698871x">
        <button class="gestion-de-usuarios-frame-32x-2">
            <p class="gestion-de-usuarios-docentes">Docentes</p>
        </button>
        <button class="gestion-de-usuarios-frame-32x">
            <p class="gestion-de-usuarios-docentes-0">Estudiantes</p>
        </button>
    </div>
    <div class="gestion-de-usuarios-box_941197962x">
        <div >
                <input type="text" class="gestion-de-usuarios-frame-33x-1" placeholder="Buscar" />
        </div>
        <button class="gestion-de-usuarios-frame-31x">
            <p class="gestion-de-usuarios-nuevo-docente">Nuevo docente</p>
        </button>
    </div>
    <div class="gestion-de-usuarios-box_12763box_12764127651277312774x">
        <div class="gestion-de-usuarios-ellipse-9x"></div>
        <div class="gestion-de-usuarios-box_1276412765x">
            <p class="gestion-de-usuarios-hctor-javier-paiz-r">
                Héctor Javier Paiz Ramos
            </p>
            <p class="gestion-de-usuarios-docente">Docente</p>
        </div>
        <button class="gestion-de-usuarios-frame-38x">
            <div class="gestion-de-usuarios-material-symbols-edit">
                <svg width="100%" height="100%" preserve-aspect-ratio="none" view-box="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 19.3 8.925 L 15.05 4.725 L 16.45 3.325 C 16.833 2.942 17.304 2.75 17.863 2.75 C 18.422 2.75 18.892 2.942 19.275 3.325 L 20.675 4.725 C 21.058 5.108 21.258 5.571 21.275 6.113 C 21.292 6.655 21.108 7.117 20.725 7.5 L 19.3 8.925 Z M 17.85 10.4 L 7.25 21 H 3 V 16.75 L 13.6 6.15 L 17.85 10.4 Z" fill="#1E6DA6" />
                </svg>
            </div>
            <p class="gestion-de-usuarios-editar">Editar</p>
        </button>
        <button class="gestion-de-usuarios-frame-39x">
            <div class="gestion-de-usuarios-ep-user-filled">
                <svg width="100%" height="100%" preserve-aspect-ratio="none" view-box="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 6.75 7.5 C 6.75 8.892 7.303 10.228 8.288 11.212 C 9.272 12.197 10.608 12.75 12 12.75 C 13.392 12.75 14.728 12.197 15.712 11.212 C 16.697 10.228 17.25 8.892 17.25 7.5 C 17.25 6.108 16.697 4.772 15.712 3.788 C 14.728 2.803 13.392 2.25 12 2.25 C 10.608 2.25 9.272 2.803 8.288 3.788 C 7.303 4.772 6.75 6.108 6.75 7.5 Z M 19.5 21.75 H 3.75 C 3.551 21.75 3.36 21.671 3.22 21.53 C 3.079 21.39 3 21.199 3 21 V 18.75 C 3 17.755 3.395 16.802 4.098 16.098 C 4.802 15.395 5.755 15 6.75 15 H 17.25 C 18.245 15 19.198 15.395 19.902 16.098 C 20.605 16.802 21 17.755 21 18.75 V 21 C 21 21.199 20.921 21.39 20.78 21.53 C 20.64 21.671 20.449 21.75 20.25 21.75 H 19.5 Z" fill="#1E6DA6" />
                </svg>
            </div>
            <p class="gestion-de-usuarios-ver-ms">Ver más</p>
        </button>
    </div>
</div>
@endsection