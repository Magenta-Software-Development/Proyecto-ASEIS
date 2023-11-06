document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#contentDescripcion2'))
        .then(editor => {
            // El editor está listo y se puede acceder a través del parámetro 'editor'
            function obtenerContenido() {
                console.log("Funciona correctamente");
                const contenido = editor.getData();
                return contenido;
            }

            const botonObtenerContenido = document.getElementById('btnCrearNoticias');
            botonObtenerContenido.addEventListener('click', function(){
                const contenidoTextEditor = obtenerContenido();
                const urlImagen = urlImagenDeFirebase;
                const inputT = $("#inputT").val();
                $("#inputT").val('');
                editor.setData('');
                // Validando si los valores no están vacíos
                if (contenidoTextEditor && urlImagen && inputT) {
                    crearNoticia(contenidoTextEditor,urlImagen,inputT);
                } else {
                    // Al menos uno de los valores si está vacío, muestra un mensaje de error
                    //console.error("Por favor, completa todos los campos antes de enviar la noticia.");
                    sweetalert('error','Campos vacios','Antes de crear una noticia, debe llenar todos los campos que se le piden.')
                }
            });
        })
        .catch(error => {
            console.error(error);
        });
});
