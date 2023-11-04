$(document).ready(function() {
   
    // Obtener el ID del docente almacenado en el localStorage este es el id de usuario no de docente
    var idDocente = localStorage.getItem("id");
    var idDocenteImagenActualizar = 1; //Para poder obtener el id de docente

    //Variables para establecer los valores por defecto que trae la api cuando se consulta el docente 
    var cargarNombreInput = "";
    var cargarDescripcion = "";
    var cargarEspecilidad = "";
    var idEspecialidadPorDefecto = 1;
    
    //---------------------------- Obtener todos los datos del cliente y llenar la tarjeta ---------------------------------------
    $.ajax({
        type: "GET",
        url: `https://springgcp-402821.uc.r.appspot.com/api/docentes/buscar-docente-por-usuario/${idDocente}`,
        success: function(data) {
            
            //Se obinenen lo valores y se llana las variables
            cargarNombreInput = data.nombre;
            cargarDescripcion = data.descripcion;
            cargarEspecilidad = data.id_especialidad.especialidad;
            idEspecialidadPorDefecto = data.id_especialidad.id_especialidad;

            idDocenteImagenActualizar = data.id_docente; //-->Obtenemos el id de docente para pasarlo como parametro en el endpoit de actulizar

            $("#nombreDocente-Pefil").text(data.nombre);
            $("#especialidadDocente").text(`Especialidad: ${data.id_especialidad.especialidad}`);
            $("#correoDocenteLis").text(`Correo: ${data.id_usuario.correo}`);
            $("#DescDocenteLis").text(`Descripción: ${data.descripcion}`);

            // También puedes actualizar la imagen
            $(".foto-redonda").attr("src", data.imagen);
        },
        error: function(error) {
            console.error("Error al cargar la información del docente:", error);
        }
    });
    //---------------------------- Fin de obtener todos los datos del cliente --------------------------------------

    function llenarInpustDeEditar()
    {
        $("#campo1").val(cargarNombreInput);
        $("#campo3").val(cargarDescripcion);
    }

    function llenarEspecilidad(){

        // Realiza una solicitud GET para obtener la lista de especialidades
        $.ajax({
            type: "GET",
            url: "https://springgcp-402821.uc.r.appspot.com/api/especialidades",
            success: function(especialidades) {
                // Obtén el select por su ID
                var selectEspecialidades = document.getElementById("especialidadDocenteSelector");
    
                // Limpia el select de opciones existentes
                selectEspecialidades.innerHTML = "";
    
                // Agrega una opción por defecto
                var defaultOption = document.createElement("option");
                defaultOption.text = cargarEspecilidad; // Se carga el select con la especialidad
                selectEspecialidades.add(defaultOption);

                var especialidadesFiltradas = especialidades.filter(function(especialidad) {
                    return especialidad.estado === true;
                });
        
                // Agrega cada especialidad como una opción
                especialidadesFiltradas.forEach(function(especialidad) {
                    var option = document.createElement("option");
                    option.value = especialidad.id_especialidad;
                    option.text = especialidad.especialidad;
                    selectEspecialidades.add(option);
                });
            },
            error: function(error) {
                console.error("Error al cargar las especialidades:", error);
            }
        });
    }

    function cambiarFotoPerfil(){
        //--------------------- Subir la imagen -------------------------------------------------------------------
        var fileInput = document.getElementById("imageInput");
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
                    // La variable "response" debería contener la URL de la imagen en Firebase
                    var urlImagenDeFirebase = response.message;

                    // Ahora, realiza la solicitud PUT para actualizar la imagen del docente
                    $.ajax({
                        type: "PUT",
                        url: `https://springgcp-402821.uc.r.appspot.com/api/docentes/actualizar-foto-de-perfil/${idDocenteImagenActualizar}`,
                        data: JSON.stringify({ imagen: ""+urlImagenDeFirebase }),
                        contentType: "application/json",
                        success: function(putResponse) {
                            // Procesa la respuesta de la solicitud PUT
                            console.log("La imagen del docente ha sido actualizada:", putResponse);
                        },
                        error: function(putError) {
                            console.error("Error al actualizar la imagen del docente:", putError);
                        }
                    });

                },
                error: function(error) {
                    console.error("Error al subir la imagen:", error);
                }
            });
        } else {
            console.error("No se ha seleccionado una imagen para subir.");
        }
        //--------------------------------------------- Fin del bloque subir y cambiar la foto ----------------------
    }

    function guardarDatosDocente(){

        //Obterner lo valores de los inputs para actulizar el perfil 
        var nombre = $("#campo1").val(); // Obtiene el valor del campo de nombre
        var descripcion = $("#campo3").val(); // Obtiene el valor del campo de descripción
        var idEspecialidad = $("#especialidadDocenteSelector").val(); // Obtiene el valor seleccionado del select
        
        if(isNaN(idEspecialidad))
        {
            var datosObjeto = {    
                nombre: nombre,
                descripcion: descripcion,
                id_especialidad: {
                    id_especialidad: idEspecialidadPorDefecto// Convierte el valor a un número entero
                }
            }; 
        }
        else{

            var datosObjeto = {    
                nombre: nombre,
                descripcion: descripcion,
                id_especialidad: {
                    id_especialidad: parseInt(idEspecialidad)// Convierte el valor a un número entero
                }
            }; 

        }

        //Funcionabilida para mandar los datos y poder actulizar
        $.ajax({
            type: "PUT",
            url: `https://springgcp-402821.uc.r.appspot.com/api/docentes/actualizar/${idDocenteImagenActualizar}`, // Reemplaza "12" con el ID correcto
            data: JSON.stringify(datosObjeto),
            contentType: "application/json",
            success: function(putResponse) {
                // Procesa la respuesta de la solicitud PUT
                console.log("Los datos del docente han sido actualizados:", putResponse);
                location.reload();
            },
            error: function(putError) {
                console.error("Error al actualizar los datos del docente:", putError);
            }
        });
    }

    $("#btn-GuardarCambiosActulizados").click(function() {
        cambiarFotoPerfil(); //Se llama la funion de cambiar foto de perfil
        setTimeout(guardarDatosDocente, 2000); //Se establecen 2 segundos para la repsues de la api
    });


    $("#btn-editarPerfilDocente").click(function() {
        llenarEspecilidad() //--> Se hace el llamado a la funcion para cargar la especilaidad 
        llenarInpustDeEditar() // --> Se hace el llamado  la funcion de llenar inpust
    });

});








