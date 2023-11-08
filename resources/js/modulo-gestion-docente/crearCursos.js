
function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    });
}

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
                    reject("No se han encotrado categorias");
                }
            },
            erro: function (error){
                reject(error);
            }

        });
    });

}

async function cargarNombreDocente()
{
    return new Promise((resolve, reject) => {

        var idDocente = localStorage.getItem("id");
        var nombreTutor = document.getElementById("tutor");

        
        $.ajax({
            type: "GET",
            url: `https://springgcp-402821.uc.r.appspot.com/api/docentes/buscar-docente-por-usuario/${idDocente}`,
            success: function(data) {
                
                //Se obinenen lo valores y se llana las variables
                var nombreDocente = data.nombre;
                // Establece el valor del input con el nombre del docente
                if (nombreDocente) {
                    nombreTutor.value = nombreDocente;
                }

                resolve() //Resuelve la promesa
            },
            error: function(error) {
                reject(error)
            }
        });
        //---------------------------- Fin de obtener todos los datos del cliente --------------------------------------

    });
}

async function obtenerIdDocente()
{
    return new Promise((resolve, reject) => {

        var idDocente = localStorage.getItem("id"); //Es el id de usuario
        var idDocenteParametro = "";
        
        //
        $.ajax({
            type: "GET",
            url: `https://springgcp-402821.uc.r.appspot.com/api/docentes/buscar-docente-por-usuario/${idDocente}`,
            success: function(data) {
                //Se obinenen lo valores y se llana las variables
                idDocenteParametro = data.id_docente;
                resolve(idDocenteParametro) //Resuelve la promesa y se devuelve el id del docente
            },
            error: function(error) {
                reject(error)
            }
        });
        //---------------------------- Fin de obtener todos los datos del cliente --------------------------------------

    });
}

function limpiarFormulario() {
    document.getElementById("titulo").value = "";
    document.getElementById("descripcionC").value = "";
    document.getElementById("cupos").value = "";
    document.getElementById("fechaInicio").value = "";
    document.getElementById("fechaFin").value = "";
    document.getElementById("horarios").value = "";
    document.getElementById("modalidad").selectedIndex = 0; 
    document.getElementById("categoria").selectedIndex = 0; 
}

async function subirImagenFirebase(){

    return new Promise((resolve, reject) => {

        //--------------------- Subir la imagen -------------------------------------------------------------------
        var fileInput = document.getElementById("archivo-cargado");
        var imagen = fileInput.files[0];
            
        if (imagen) {
            var formData = new FormData();
            formData.append("file", imagen);

            // Realizar la solicitud POST para subir la imagen al servidor
            $.ajax({
                type: "POST",
                url: "https://springgcp-402821.uc.r.appspot.com/api/subir-archivo",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var urlImagenDeFirebase = response.message;
                    resolve(urlImagenDeFirebase) //Se devuelve la url de la imgen 
                },
                error: function(error) {
                    reject(error)
                }
            });
        }else {
            console.error("No se ha seleccionado una imagen para subir.");
        }
        //--------------------------------------------- Fin del bloque subir y cambiar la foto ----------------------
        
    })

}

function obtenerCursoData() {
    const titulo = document.getElementById("titulo").value;
    const descripcion = document.getElementById("descripcionC").value;
    const cupo = parseInt(document.getElementById("cupos").value, 10);
    const fechaInicio = document.getElementById("fechaInicio").value;
    const fechaFin = document.getElementById("fechaFin").value;
    const horario = document.getElementById("horarios").value;
    const modalidadId = parseInt(document.getElementById("modalidad").value, 10);
    const categoriaId = parseInt(document.getElementById("categoria").value, 10);
    const idUsuario = localStorage.getItem("id");

    if (!titulo || !descripcion || isNaN(cupo) || cupo <= 0 || !fechaInicio || !fechaFin || !horario || modalidadId === 0 || categoriaId === 0) {
        sweetalert('error', 'Error', 'No deben haber campos vacíos.');
        return;
    }

    const cursoData = {
        titulo: titulo,
        descripcion: descripcion,
        cupo: cupo,
        fecha_ini: fechaInicio,
        fecha_fin: fechaFin,
        puntuacion: 0,
        horario: horario,
        id_modalidad: {
            id_modalidad: modalidadId
        },
        id_docente: {
            id_docente: null // Esto debe llenarse después de obtener el ID del docente
        },
        imagen: null, // Esto debe llenarse después de subir la imagen
        estado: true,
        id_categoria: {
            id_categoria: categoriaId
        },
        temas: {
            contenido: {
                tema1: {
                    titulo: "Introduccion al tema 1",
                    descripcion: "Contenido 1"
                },
                tema2: {
                    titulo: "Introduccion al tema 2",
                    descripcion: "Contenido 2"
                }
            }
        }
    };

    return { cursoData, idUsuario };
}

async function crearCurso() {
    const { cursoData, idUsuario } = obtenerCursoData();

    try {
        const urlDeImagen = await subirImagenFirebase();
        cursoData.imagen = urlDeImagen;

        const idDocente = await obtenerIdDocente();
        cursoData.id_docente.id_docente = idDocente;

        const response = await $.ajax({
            type: "POST",
            url: "https://springgcp-402821.uc.r.appspot.com/api/cursos/crear",
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(cursoData),
        });

        const idCurso = response.curso.id_curso;
        const cuerpoSegundaPeticion = {
            id_curso: {
                id_curso: idCurso
            },
            id_usuario: {
                id_usuario: idUsuario
            }
        };

        const segundaRespuesta = await $.ajax({
            type: "POST",
            url: "https://springgcp-402821.uc.r.appspot.com/api/curso-usuario/crear",
            contentType: "application/json",
            crossDomain: true,
            data: JSON.stringify(cuerpoSegundaPeticion),
        });

        sweetalert('success', 'Curso creado con éxito!', segundaRespuesta.message);
    } catch (error) {
        console.log("Error al crear el curso:", error);
        sweetalert('error', 'Error al crear el curso', error.message);
    }
}

$(document).ready(async function () {
    try {
        await cargarSelectModalidad();
        await cargarSelectCategoria();
        await cargarNombreDocente();
        console.log("Nombre cargado con éxito");
    } catch (error) {
        console.log("Error en la carga de datos:", error);
    }

    var btnCrarCurso = document.getElementById("btnCrearCurso");
    btnCrarCurso.addEventListener("click", async function(event){
        event.preventDefault();
        try {
            await crearCurso();
            limpiarFormulario();
        } catch (error) {
            console.log("Error al crear el curso", error);
        }
    });
});





