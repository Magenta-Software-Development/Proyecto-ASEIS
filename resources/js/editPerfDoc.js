function sweetalert(icon, title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    });
}

$(document).ready(async function() {
    const idDocente = localStorage.getItem("id");
    let idDocenteImagenActualizar = 1;
    let cargarNombreInput = "";
    let cargarDescripcion = "";
    let cargarEspecilidad = "";
    let idEspecialidadPorDefecto = 1;

    // Función para obtener los datos del docente
    async function obtenerDatosDocente() {
        try {
            const response = await $.ajax({
                type: "GET",
                url: `https://springgcp-402821.uc.r.appspot.com/api/docentes/buscar-docente-por-usuario/${idDocente}`,
            });
            cargarNombreInput = response.nombre;
            cargarDescripcion = response.descripcion;
            idEspecialidadPorDefecto = response.id_especialidad.id_especialidad;
            cargarEspecilidad = response.id_especialidad.especialidad;

            $("#nombreDocente-Pefil").text(response.nombre);
            $("#especialidadDocente").text(`Especialidad: ${response.id_especialidad.especialidad}`);
            $("#correoDocenteLis").text(`Correo: ${response.id_usuario.correo}`);
            $("#DescDocenteLis").text(`Descripción: ${response.descripcion}`);

            // También puedes actualizar la imagen
            $(".foto-redonda").attr("src", response.imagen);

            idDocenteImagenActualizar = response.id_docente;
        } catch (error) {
            console.error("Error al cargar la información del docente:", error);
        }
    }

    // Función para llenar los campos de edición
    function llenarInputsDeEditar() {
        $("#campo1").val(cargarNombreInput);
        $("#campo3").val(cargarDescripcion);
    }

    // Función para llenar el select de especialidades
    async function llenarEspecialidades() {
        try {
            const especialidades = await $.ajax({
                type: "GET",
                url: "https://springgcp-402821.uc.r.appspot.com/api/especialidades",
            });

            const selectEspecialidades = document.getElementById("especialidadDocenteSelector");
            selectEspecialidades.innerHTML = "";

            // Agrega la opción por defecto
            const defaultOption = document.createElement("option");
            defaultOption.text = cargarEspecilidad; //Se carga la especialidad que trae en la peticion de obtner los datos del docente
            selectEspecialidades.add(defaultOption);

            // Filtra las especialidades activas
            const especialidadesFiltradas = especialidades.filter(especialidad => especialidad.estado === true);

            // Agrega las especialidades al select
            especialidadesFiltradas.forEach(especialidad => {
                const option = document.createElement("option");
                option.value = especialidad.id_especialidad;
                option.text = especialidad.especialidad;
                selectEspecialidades.add(option);
            });
        } catch (error) {
            console.error("Error al cargar las especialidades:", error);
        }
    }

    // Función para cambiar la foto de perfil
    async function cambiarFotoPerfil() {
        const fileInput = document.getElementById("imageInput");
        const imagen = fileInput.files[0];

        if (imagen) {
            try {
                const formData = new FormData();
                formData.append("file", imagen);

                const response = await $.ajax({
                    type: "POST",
                    url: "https://springgcp-402821.uc.r.appspot.com/api/subir-archivo",
                    data: formData,
                    contentType: false,
                    processData: false,
                });

                const urlImagenDeFirebase = response.message;

                const putResponse = await $.ajax({
                    type: "PUT",
                    url: `https://springgcp-402821.uc.r.appspot.com/api/docentes/actualizar-foto-de-perfil/${idDocenteImagenActualizar}`,
                    data: JSON.stringify({ imagen: "" + urlImagenDeFirebase }),
                    contentType: "application/json",
                });

                //Para no tener que recargar la pagina otra vez solo que lo eficiente tiene que ser el estatus de la peticion
                if (putResponse.message === "Foto de perfil actualizada con exito") {
                    $(".foto-redonda").attr("src", urlImagenDeFirebase);
                }
                
            } catch (error) {
                sweetalert('error', 'No se pudo actilizar la foto');
            }
        } else {
            console.error("No se ha seleccionado una imagen para subir.");
        }
    }

    // Función para guardar los datos del docente
    async function guardarDatosDocente() {
        const nombre = $("#campo1").val();
        const descripcion = $("#campo3").val();
        const idEspecialidad = $("#especialidadDocenteSelector").val();
        let idEspecialidadInt;

        //Cargar La especialidad para una variable que ayuda a que no se recargue la pagina
        let textoEspecialidad = $("#especialidadDocenteSelector option:selected").text(); // Esto obtiene el texto ("Backend" en tu caso)

        if (isNaN(idEspecialidad)) {
            idEspecialidadInt = idEspecialidadPorDefecto;
        } else {
            idEspecialidadInt = parseInt(idEspecialidad);
        }

        const datosObjeto = {
            nombre: nombre,
            descripcion: descripcion,
            id_especialidad: {
                id_especialidad: idEspecialidadInt,
            },
        };

        try {
            const putResponse = await $.ajax({
                type: "PUT",
                url: `https://springgcp-402821.uc.r.appspot.com/api/docentes/actualizar/${idDocenteImagenActualizar}`,
                data: JSON.stringify(datosObjeto),
                contentType: "application/json",
            });

            if(putResponse.message === "Tu cuenta ha sido actualizada con exito")
            {
                $("#nombreDocente-Pefil").text(nombre);
                $("#especialidadDocente").text(`Especialidad: ${textoEspecialidad}`);
                $("#DescDocenteLis").text(`Descripción: ${descripcion}`);
            }

            console.log("Los datos del docente han sido actualizados:", putResponse);
            
        } catch (error) {
            console.error("Error al actualizar los datos del docente:", error);
        }
    }

    // Manejar el botón de Guardar Cambios
    $("#btn-GuardarCambiosActulizados").click(async function() {
        await cambiarFotoPerfil();
        await guardarDatosDocente();
        sweetalert('success', 'Actulizado con exito');
        
    });

    // Manejar el botón de Editar Perfil
    $("#btn-editarPerfilDocente").click(async function() {
        await llenarEspecialidades();
        llenarInputsDeEditar();
    });

    // Obtener los datos del docente al cargar la página
    await obtenerDatosDocente();
});
