$(document).ready(function() {
   
    
    // Obtener el ID del docente almacenado en el localStorage
    var idDocente = localStorage.getItem("id");

    console.log("Hola Daviddddddd")

    // Realizar la solicitud AJAX al endpoint con el ID
    $.ajax({
        type: "GET",
        url: `https://springgcp-402821.uc.r.appspot.com/api/docentes/buscar-docente-por-usuario/${idDocente}`,
        success: function(data) {
            // Actualizar los elementos HTML con los datos de la respuesta
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

    // Obtener el botón de "Editar Perfil" y el modal
    const btnEditarPerfil = $("#editar-perfil");
    const modal = $("#modal");
 
    // Evento que al hacer clic ejecuta el movimiento del modal
    btnEditarPerfil.click(function() {
        modal.css("display", "block");
    });
 
    // Cerrar el modal al hacer clic
    modal.click(function(e) {
        if (e.target === modal[0]) {
            modal.css("display", "none");
        }
    });
 


});








