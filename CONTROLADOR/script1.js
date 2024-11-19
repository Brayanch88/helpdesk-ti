document.addEventListener("DOMContentLoaded", () => {
    const abrirModal = document.getElementById('abrirModal');
    const modal = document.getElementById('modalTicket');
    const cerrarModal = document.getElementById('cerrarModal');
    const iframeTicket = document.getElementById('iframeTicket');

    // Función para abrir el modal
    abrirModal.addEventListener('click', () => {
        iframeTicket.src = 'ticket.php'; // Cargar `ticket.php` en el iframe
        modal.style.display = "block";
    });

    // Función para cerrar el modal
    cerrarModal.addEventListener('click', () => {
        modal.style.display = "none";
        iframeTicket.src = ''; // Limpiar el src del iframe al cerrar
    });

    /* Cerrar el modal al hacer clic fuera de la ventana de contenido
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
            iframeTicket.src = ''; // Limpiar el src del iframe al cerrar
        }
    });*/
});
