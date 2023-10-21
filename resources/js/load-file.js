$(document).ready(function () {
    $("#file_input").on("change", function () {
        let fileName = $(this).val();
        let fileExtension = fileName.split(".").pop().toLowerCase();

        // Verificar si la extensión es .xlsx
        if (fileExtension !== "xlsx") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, selecciona un archivo con extensión .xlsx!',
              })
            $(this).val("");
        }
        console.log("selecionado")
    });
});
