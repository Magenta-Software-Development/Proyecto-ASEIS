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

<div id="firejet-html-app">
      <div class="frame-5-box_box_88838884box_1688316881130126x">
        <div class="frame-5-box_88838884x">
          <div class="frame-5-frame-32x-2">
            <p class="frame-5-docentes">Docentes</p>
          </div>
          <div class="frame-5-frame-32x">
            <p class="frame-5-docentes-0">Estudiantes</p>
          </div>
        </div>
        <div class="frame-5-box_1688316881x">
          <div class="frame-5-frame-33x-1">
            <div class="frame-5-vector">
              <svg
                width="100%"
                height="100%"
                preserve-aspect-ratio="none"
                view-box="0 0 18 18"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M 16.6 18 L 10.3 11.7 C 9.8 12.1 9.225 12.417 8.575 12.65 C 7.925 12.883 7.233 13 6.5 13 C 4.683 13 3.146 12.371 1.888 11.112 C 0.63 9.853 0.001 8.316 0 6.5 C 0 4.683 0.629 3.146 1.888 1.888 C 3.147 0.63 4.684 0.001 6.5 0 C 8.317 0 9.854 0.629 11.112 1.888 C 12.37 3.147 12.999 4.684 13 6.5 C 13 7.233 12.883 7.925 12.65 8.575 C 12.417 9.225 12.1 9.8 11.7 10.3 L 18 16.6 L 16.6 18 Z M 6.5 11 C 7.75 11 8.813 10.562 9.688 9.687 C 10.563 8.812 11.001 7.749 11 6.5 C 11 5.25 10.562 4.187 9.687 3.312 C 8.812 2.437 7.749 1.999 6.5 2 C 5.25 2 4.187 2.438 3.312 3.313 C 2.437 4.188 1.999 5.251 2 6.5 C 2 7.75 2.438 8.813 3.313 9.688 C 4.188 10.563 5.251 11.001 6.5 11 Z"
                  fill="#797979"
                />
              </svg>
            </div>
            <p class="frame-5-buscar">Buscar...</p>
          </div>
          <div class="frame-5-frame-31x">
            <p class="frame-5-nuevo-estudiante">Nuevo estudiante</p>
          </div>
        </div>
        <div class="frame-5-box_130127box_130128130129130130130134x">
          <div class="frame-5-ellipse-9x"></div>
          <div class="frame-5-box_130128130129x">
            <p class="frame-5-elian-francisco-trem">
              Elian Francisco Treminio Parada
            </p>
            <p class="frame-5-estudiante">Estudiante</p>
          </div>
          <div class="frame-5-frame-38x">
            <div class="frame-5-material-symbols-edit">
              <svg
                width="100%"
                height="100%"
                preserve-aspect-ratio="none"
                view-box="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M 19.3 8.925 L 15.05 4.725 L 16.45 3.325 C 16.833 2.942 17.304 2.75 17.863 2.75 C 18.422 2.75 18.892 2.942 19.275 3.325 L 20.675 4.725 C 21.058 5.108 21.258 5.571 21.275 6.113 C 21.292 6.655 21.108 7.117 20.725 7.5 L 19.3 8.925 Z M 17.85 10.4 L 7.25 21 H 3 V 16.75 L 13.6 6.15 L 17.85 10.4 Z"
                  fill="#1E6DA6"
                />
              </svg>
            </div>
            <p class="frame-5-editar">Editar</p>
          </div>
          <div class="frame-5-frame-39x">
            <div class="frame-5-ep-user-filled">
              <svg
                width="100%"
                height="100%"
                preserve-aspect-ratio="none"
                view-box="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M 6.75 7.5 C 6.75 8.892 7.303 10.228 8.288 11.212 C 9.272 12.197 10.608 12.75 12 12.75 C 13.392 12.75 14.728 12.197 15.712 11.212 C 16.697 10.228 17.25 8.892 17.25 7.5 C 17.25 6.108 16.697 4.772 15.712 3.788 C 14.728 2.803 13.392 2.25 12 2.25 C 10.608 2.25 9.272 2.803 8.288 3.788 C 7.303 4.772 6.75 6.108 6.75 7.5 Z M 19.5 21.75 H 3.75 C 3.551 21.75 3.36 21.671 3.22 21.53 C 3.079 21.39 3 21.199 3 21 V 18.75 C 3 17.755 3.395 16.802 4.098 16.098 C 4.802 15.395 5.755 15 6.75 15 H 17.25 C 18.245 15 19.198 15.395 19.902 16.098 C 20.605 16.802 21 17.755 21 18.75 V 21 C 21 21.199 20.921 21.39 20.78 21.53 C 20.64 21.671 20.449 21.75 20.25 21.75 H 19.5 Z"
                  fill="#1E6DA6"
                />
              </svg>
            </div>
            <p class="frame-5-ver-ms">Ver más</p>
          </div>
        </div>
      </div>
    </div>
@endsection