@extends('layouts.app')
@section('title', 'Inicio de sesión')
@section('content')

    <div
        class="w-[1440px] h-[1024px] bg-[#D9D9D9] font-inter font-[600] py-[120px] px-[168px] flex justify-center items-center text-left">
        <div
            class="gap-[130px] pb-[143px] pl-[134px] pt-[118px] rounded-2xl w-full flex bg-white h-full items-end justify-between pr-14">
            <div class="h-[496px] bg-logo-aseis-news-vertical-1x w-72 bg-center bg-cover">
                <img src="https://uortjlczjmucmpaqqhqm.supabase.co/storage/v1/object/public/firejet-converted-images/images/c01fa20a026a0b11fd19195cb8afd3ea163f3fd8.webp"
                    alt="">
            </div>
            <div class="[flex-grow:1] gap-[29px] flex flex-col justify-between h-full">
                <p class="text-[40px] w-[402px] text-black h-12">
                    Bienvenido de nuevo
                </p>
                <div class="gap-[25px] flex flex-col items-end w-full">
                    <div
                        class="gap-[19px] font-inter font-[600] inline-flex flex-col items-start text-black text-left [flex-grow:1]">
                        <p class="transition-all text-xl w-[181px]">
                            Correo electrónico
                        </p>
                        <input type="text"
                            class="[box-shadow:0px_0px_0px_2px_rgba(121,_121,_121,_1)_inset] [box-shadow-width:2px] w-[496px] h-[60px] rounded-2xl" />
                    </div>
                    <div
                        class="gap-[19px] font-inter font-[600] inline-flex flex-col items-start text-black text-left [flex-grow:1]">
                        <p class="transition-all text-xl w-[113px]">Contraseña</p>
                        <input type="password"
                            class="[box-shadow:0px_0px_0px_2px_rgba(121,_121,_121,_1)_inset] [box-shadow-width:2px] w-[496px] h-[60px] rounded-2xl" />
                    </div>
                    <p class="text-[#6D6D6D] w-[253px] text-xl h-6">
                        ¿Olvidaste tu contraseña?
                    </p>
                    <button type="submit"
                        class="w-[496px] bg-[#1F76BD] mt-[19px] gap-2.5 flex justify-center items-center rounded-2xl p-4 text-white">
                        <p class="[max-width:153px] w-[37.3%] text-2xl">
                            Iniciar sesión
                        </p>
                </div>
                <div class="mt-[11px] w-[418px] leading-none h-6">
                    <p class="text-[#6D6D6D] text-xl inline">
                        ¿Aun no tienes una cuenta?
                    </p>
                    <p class="text-[#1F76BD] text-xl inline">Regístrate aquí</p>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
