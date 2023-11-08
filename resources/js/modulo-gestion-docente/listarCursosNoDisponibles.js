
$(document).ready(function() {

    var idUsuarioDocente = localStorage.getItem("id");

    console.log("El id del usuario es: "+idUsuarioDocente);

    $.ajax({
        type: "GET", url: `https://springgcp-402821.uc.r.appspot.com/api/curso-usuario/ver-por-id-usuario/${idUsuarioDocente}`,
       
        success: function(data) {

            const contenedorListaCursos = document.getElementById("container-cursos-publicados");
            $("#container-cursos-publicados").empty();
            contenedorListaCursos.style.marginTop = "25px";
            contenedorListaCursos.style.width = "100%"
    
            if (data.cursosUsuarios && data.cursosUsuarios.length > 0) {
                data.cursosUsuarios.forEach(function (cursoUsuario) {
                    if (cursoUsuario.id_curso.estado === false) {

                        var curso = cursoUsuario.id_curso;
                        var nombreCurso = curso.titulo;
                        var nombreDocente = curso.id_docente.nombre;
                        var imagenCurso = curso.imagen;
                        
                        const nuevoCursoDiv = document.createElement("div");
                            nuevoCursoDiv.style.marginTop = "10px"
                            nuevoCursoDiv .innerHTML = '';
                            nuevoCursoDiv.innerHTML = `
                            <div class="container contenedorCursos">
                                <div class="row tablaContenidosCursos">
    
                                    <div class="col-sm-4 align-items-start"><!-- imagen del curso -->
                                        <img class="contenedorImagen" src="${imagenCurso}">
                                    </div>
                            
                                    <div class="col-sm-3"><!-- nombre del curso y de el docente -->
                                        <div class="contenedorNombreCurso">${nombreCurso}</div>
                                        <div class="contenedorNombreDocente">${nombreDocente}</div>
                                    </div>
                        
                                    <div class="col-sm-5 custom-align-bottom"><!-- botones de mas informacion y habilitar -->
                                            
                                        <div class="botonCurso botonFiltroDesactivoCurso">
                                                    <button data-bs-toggle="modal" data-bs-target="#modalMasInfoNoPublic">
                                                    más información
                                                </button>
                                            </a>                
                                        </div>
                        
                                        <div class="botonCurso botonFiltroActivoCurso">
                                            <a href="#">
                                                <button>
                                                    Habilitar
                                                </button>
                                            </a>
                                        </div>
     
                                    </div>
    
                                </div>
                            </div>
                        `;
    
                        contenedorListaCursos.appendChild(nuevoCursoDiv);

                    }
                });
            }
        },
        error: function(error) {
            console.error("Error al cargar los datos del curso:", error);
        }
    });

});
