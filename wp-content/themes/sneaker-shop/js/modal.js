// Esperar a que el documento esté cargado
document.addEventListener('DOMContentLoaded', function() {
    // Obtener todas las imágenes de productos
    const productImages = document.querySelectorAll('.product-image');
    
    // Iterar sobre todas las imágenes de productos
    productImages.forEach(image => {
        image.addEventListener('click', function(event) {
            event.preventDefault();  // Evitar que el enlace navegue

            // Obtener el ID del modal desde el atributo data-modal-id
            const modalId = this.getAttribute('data-modal-id');
            const modal = document.getElementById(modalId);

            // Mostrar el modal
            if (modal) {
                modal.style.display = 'block';
            }
        });
    });

    // Obtener todos los botones de cerrar
    const closeButtons = document.querySelectorAll('.close-modal');
    
    // Iterar sobre todos los botones de cerrar
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Obtener el modal que contiene este botón
            const modal = this.closest('.modal');

            // Ocultar el modal
            if (modal) {
                modal.style.display = 'none';
            }
        });
    });

    // Cerrar el modal si se hace clic fuera del contenido
    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });
});


// ... código del archivo ...
// Versión 1.0