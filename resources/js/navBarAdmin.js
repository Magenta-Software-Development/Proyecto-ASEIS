// Al cargar la página, verifica si hay un botón activo almacenado en las cookies
$(document).ready(function() {
    // Al hacer clic en un botón
    $('.custom-div').on('click', function() {
        $('.custom-div').removeClass('active'); // Elimina la clase activa de todos los botones
        $(this).addClass('active'); // Agrega la clase activa al botón clicado
        var buttonId = $(this).attr('id');
        localStorage.setItem('activeButton', buttonId); // Almacena el ID del botón en el almacenamiento local
    });

    // Al cargar la página, verifica si hay un botón activo almacenado en el almacenamiento local
    var activeButtonId = localStorage.getItem('activeButton');
    if (activeButtonId) {
        $('#' + activeButtonId).addClass('active'); // Agrega la clase activa al botón almacenado en el almacenamiento local
    }
});


// Función para establecer una cookie
function setCookie(name, value, days) {
    var expires = '';
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = '; expires=' + date.toUTCString();
    }
    document.cookie = name + '=' + value + expires + '; path=/';
}

// Función para obtener el valor de una cookie por su nombre
function getCookie(name) {
    var nameEQ = name + '=';
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.indexOf(nameEQ) == 0) {
            return cookie.substring(nameEQ.length, cookie.length);
        }
    }
    return null;
}
