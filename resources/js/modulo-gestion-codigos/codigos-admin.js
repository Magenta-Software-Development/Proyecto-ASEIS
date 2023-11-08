let arregloCodigos = [];
function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    });
}
function sweetalertquestion(icon,title,message,messageConfirmButton, icon2,title2,message2){
    Swal.fire({
        title: title,
        text: message,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: messageConfirmButton
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "https://springgcp-402821.uc.r.appspot.com/api/codigos/crear", 
                contentType: "application/json",
                crossDomain: true,
                success: function (response, textStatus, xhr) {
                    localStorage.removeItem('idUsuario');
                    sweetalert(icon2,title2,message2);
                    obtenerCodigosDelServidor();
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    });
}
function crearListaCodigos(codigos) {
    const contenedorListaCodigos = document.getElementById("containerListaCodigos");
    $("#containerListaCodigos").empty();
    contenedorListaCodigos.style.marginTop = "25px";

    if(codigos.length === 0){
        const mensaje = document.createElement('div');
        mensaje.className = 'alert alert-primary text-center';
        mensaje.textContent = 'No hay codigos disponibles en este momento.';
        contenedorListaCodigos.appendChild(mensaje);
    }else{
        codigos.forEach(codigo => {
                const nuevoCodigoDiv = document.createElement("div");
                nuevoCodigoDiv.className = "container text-center contenedorCurso";
                nuevoCodigoDiv.style.marginTop = "6px";
                nuevoCodigoDiv.innerHTML = '';
                nuevoCodigoDiv.innerHTML = `
                    <div class="row">
                        <div class="col-8 letraCurso text-start">
                            <p>${codigo.codigo}</p>
                        </div>
                    </div>
                `;
                contenedorListaCodigos.appendChild(nuevoCodigoDiv);
        });
    }
}
function obtenerCodigosDelServidor() {
    // Hace una solicitud al servidor para obtener loa codigos del usuario
    $.ajax({
        type: "GET",
        url: `https://springgcp-402821.uc.r.appspot.com/api/codigos`,
        contentType: "application/json",
        crossDomain: true,
        success: function(response, textStatus, xhr) {
            // Almacenando los datos en el arreglo local
            arregloCodigos = response.codigos;
            // Llama a la función para mostrar los codigos en la página
            crearListaCodigos(arregloCodigos);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}
function buscarCodigo(filtro) {
    // Realizar la búsqueda en el arreglo local listaNoticias
    const resultados = arregloCodigos.filter(codigo => {
        // Aplicar lógica de filtrado según el filtro proporcionado por el usuario
        // Por ejemplo, buscar en el título de la noticia
        return codigo.codigo.toLowerCase().includes(filtro.toLowerCase());
    });
    // Llamar a la función para mostrar los resultados en la página
    crearListaCodigos(resultados);
}
const inputBusqueda = document.getElementById("inputBusqueda");
inputBusqueda.addEventListener('input', function() {
    const valorBusqueda = inputBusqueda.value;
    buscarCodigo(valorBusqueda);
});

$("#creaCodigos").click(function (e) { 
    e.preventDefault();
    sweetalertquestion("question","Creando nuevo codigo","Deseas crear un nuevo codigo de verificacion?","Si, crear","success","Codigo creado exitosamente","Se ha creado un nuevo codigo de verificacion de manera exitosa!!");
});

$(document).ready(function () {
    obtenerCodigosDelServidor();
});