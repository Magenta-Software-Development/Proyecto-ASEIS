<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASEISNEWS - Registro</title>
    <!-- Inicio Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- Fin Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Enlaza tu archivo CSS personalizado -->

    @vite('resources/css/app.css')
    @vite('resources/js/registro-docente.js')
</head>

<body>

    <div class="flex flex-col justify-center items-center h-screen bg-gray-100">
        <div class="bg-white w-2/4 flex items-center justify-center rounded-2xl">

            <div class="w-full max-w-lg pt-16 pb-16  h-auto">
                <div class="mt-7 gap-[19px] font-inter font-[600] inline-flex flex-col items-start text-black text-left [flex-grow:1] w-full">
                    <p class="transition-all text-xl font-semibold">
                        Ingresa tu correo institucional
                    </p>
                    <input type="email" id="correo" class="[box-shadow:0px_0px_0px_2px_rgba(121,_121,_121,_1)_inset] [box-shadow-width:2px] w-full h-[60px] rounded-2xl" />
                </div>
                <div class="mt-7 gap-[19px] font-inter font-[600] inline-flex flex-col items-start text-black text-left [flex-grow:1] w-full">
                    <p class="transition-all text-xl font-semibold">
                        Ingresa tu codigo unico
                    </p>
                    <input type="text" id="codigo" class="[box-shadow:0px_0px_0px_2px_rgba(121,_121,_121,_1)_inset] [box-shadow-width:2px] w-full h-[60px] rounded-2xl" />
                </div>
                <div class="flex items-center justify-between">
                    <button id="btnFindByCorreo" type="submit" class="bg-[#1F76BD] mt-[19px] w-full gap-2.5 flex justify-center items-center rounded-2xl p-[11px] text-white">
                        <p class="text-2xl">
                            Enviar
                        </p>
                    </button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>