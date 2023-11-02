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
                    listaCodigos("");
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    });
}

function crearListaCodigos(categorias, filtro) {
    const contenedorListaCategorias = document.getElementById("containerListaCodigos");
    $("#containerListaCodigos").empty();
    contenedorListaCategorias.style.marginTop = "25px";

    categorias.codigos.forEach(codigo => {
        if (codigo.codigo.toLowerCase().includes(filtro.toLowerCase())) {
            const nuevoCategoriaDiv = document.createElement("div");
            nuevoCategoriaDiv.className = "container text-center contenedorCurso";
            nuevoCategoriaDiv.style.marginTop = "6px";
            nuevoCategoriaDiv.innerHTML = '';
            nuevoCategoriaDiv.innerHTML = `
                <div class="row">
                    <div class="col-8 letraCurso text-start">
                        <p>${codigo.codigo}</p>
                    </div>
                </div>
            `;
            contenedorListaCategorias.appendChild(nuevoCategoriaDiv);
        }
    });
}

function listaCodigos(filtro) {
    $.ajax({
        type: "GET",
        url: "https://springgcp-402821.uc.r.appspot.com/api/codigos", 
        contentType: "application/json",
        crossDomain: true,
        success: function(response, textStatus, xhr) {
            console.log(response);
            crearListaCodigos(response, filtro);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(errorThrown);
        }
    });
}

const inputBusqueda = document.getElementById("inputBusqueda");

inputBusqueda.addEventListener('input', function() {
    const valorBusqueda = inputBusqueda.value;
    listaCodigos(valorBusqueda);
});

$(document).ready(function () {
    listaCodigos("");
});