// Obtener el botón de "Editar Perfil" y el modal
const btnEditarPerfil = document.getElementById('editar-perfil');
const modal = document.getElementById('modal');

// evento que al hacer clic ejecuta el movimiento del modal
btnEditarPerfil.addEventListener('click', () => {
    modal.style.display = 'block';
});

// Cerrar el modal al hacer clic
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});




