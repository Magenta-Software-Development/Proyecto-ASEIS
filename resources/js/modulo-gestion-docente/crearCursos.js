
//Funion para rellenar el select de la modalidad
async function cargarSelectModalidad() {
    return new Promise(function (resolve, reject) {

        var selectModalidad = document.getElementById("modalidad"); //Obtner el select para manipularlo

        $.ajax({
            type: "GET",
            url: "https://springgcp-402821.uc.r.appspot.com/api/modalidades",
            success: function (data) {
                if (data && data.length > 0) {
                    data.forEach(function (modalidad) {
                        var option = document.createElement("option"); 
                        option.value = modalidad.id_modalidad;
                        option.textContent = modalidad.modalidad; 
                        selectModalidad.appendChild(option); 
                    });
                    resolve(); //Resuelve la promesa
                } else {
                    reject("No se encontraron modalidades"); //Si no hay datos se rechaza la promesa
                }
            },
            error: function (error) {
                reject(error); //Se rechaza la promesa en caso de eroror
            }
        });
    });
}

async function cargarSelectCategoria(){

    return new Promise((resolve, reject) => {
        var selectCategoria = document.getElementById("categoria");

        $.ajax({
            type: "GET",
            url: "https://springgcp-402821.uc.r.appspot.com/api/categoria/obtenerCategorias",
            success: function (datosRecibidos)
            {
                if (datosRecibidos && datosRecibidos.length > 0) {

                    datosRecibidos.forEach(function (categoria) {

                        if (categoria.estado === true) {

                            var opcionCategoria = document.createElement("option")
                            opcionCategoria.value = categoria.id_categoria;
                            opcionCategoria.textContent = categoria.categoria;
                            selectCategoria.append(opcionCategoria);
                        }
                         
                    });    
                    resolve()                
                }else{
                    reject("No se han encotrado categorais");

                }
            },
            erro: function (error){
                reject(error);
            }

        });
    });

}

function mostrarNombreArchivo() {
    const fileInput = document.getElementById("button");
    const archivoCargadoInput = document.getElementById("archivo-cargado");

    if (fileInput.files.length > 0) {
        const nombreArchivo = fileInput.files[0].name;
        archivoCargadoInput.value = nombreArchivo;
    } else {
        archivoCargadoInput.value = "";
    }
}


$(document).ready(async function () {

    //Bloque try para cargar las modalidades
    try {
        await cargarSelectModalidad();
        console.log("Modalidades cargadas con éxito");
    } catch (error) {
        console.error("Error al cargar las modalidades:", error);
    }

    try {
        await cargarSelectCategoria();
        console.log("Categoria cargadas con éxito");
    } catch (error) {
        console.error("Error al cargar las categoria:", error);
    }


});





