<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASEISNEW - Inicio de sesion</title>
    <!-- Inicio Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- Fin Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Enlaza tu archivo CSS personalizado -->
    @vite('resources/css/loader.css')
    @vite('resources/css/app.css')
    @vite('resources/js/login.js')
</head>

<body>

    <div class="flex flex-col justify-center items-center h-screen bg-gray-100">
        <div class="flex flex-col md:flex-row w-10/12 h-3/4">
            <div class=" md:w-1/2 flex items-center justify-center  rounded-2xl">
                <img src="https://uortjlczjmucmpaqqhqm.supabase.co/storage/v1/object/public/firejet-converted-images/images/c01fa20a026a0b11fd19195cb8afd3ea163f3fd8.webp" alt="Image" class="w-80 h-auto">
            </div>

            <div class="bg-white md:w-1/2 flex items-center justify-center rounded-2xl">

                <div class="w-full max-w-lg">
                    <p class="text-[30px] md:text-[40px] text-black h-12 font-semibold">
                        Bienvenido
                    </p>
                    <div class="mt-7 gap-[19px] font-inter font-[600] inline-flex flex-col items-start text-black text-left [flex-grow:1] w-full">
                        <p class="transition-all text-xl font-semibold">
                            Correo electrónico
                        </p>
                        <input type="text" id="correo" class="[box-shadow:0px_0px_0px_2px_rgba(121,_121,_121,_1)_inset] [box-shadow-width:2px] w-full h-[60px] rounded-2xl" />
                    </div>
                    <div class="mt-6 gap-[19px] font-inter font-[600] inline-flex flex-col items-start text-black text-left [flex-grow:1] w-full">
                        <p class="transition-all text-xl font-semibold">
                            Contraseña
                        </p>
                        <input type="text" id="password" class="[box-shadow:0px_0px_0px_2px_rgba(121,_121,_121,_1)_inset] [box-shadow-width:2px] w-full h-[60px] rounded-2xl" />
                    </div>
                    <div class="gap-[36px] flex flex-col items-end w-full">
                        <p class=" text-[#6D6D6D] mt-6 text-xl">
                        ¿Olvidaste tu contraseña?
                        </p>
                    </div>

            
                    <!-- Modal de Indicador de Carga -->
                    <div class="modal fade" id="modal-indicador-carga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: transparent" hidden>
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: rgba(255, 255, 255, 0.7);">
                            <div class="modal-body text-center">
                                <div class="containerIndicadorLoading">
                                    <p id="messageIndicator">Cargando...</p> 
                                    <div class="loaderborde">
                                        <div class="loadersecundario">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
  

                    <div class="flex gap-[44px] items-center justify-between">
                        <button id="btnLogin" type="submit" class="bg-[#1F76BD] mt-[19px] w-full gap-2.5 flex justify-center items-center rounded-2xl p-[11px] text-white">
                            <p class="text-2xl">
                                Iniciar sesión
                            </p>
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" id="indicadorCarga" hidden>
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class=" flex flex-col items-end mt-[36px] leading-none h-6">
                        <p class="text-[#6D6D6D] text-xl inline">
                            ¿Aun no tienes una cuenta? <span class="text-[#1F76BD] text-xl inline"> <a href="{{route('registro')}}"> Regístrate aquí </a></span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>