// Selección de todos los botones de eliminar por su clase
const botonesEliminar = document.querySelectorAll('.btn-eliminar');

// Agregar un manejador de eventos clic a cada botón de eliminar
botonesEliminar.forEach(boton => {
    boton.addEventListener('click', function () {
        // Obtener el ID del registro a eliminar desde el atributo data-id
        const registroID = this.getAttribute('data-id');

        // Mostrar una alerta de confirmación antes de eliminar
        const confirmacion = confirm('¿Estás seguro de que deseas eliminar este registro?');

        if (confirmacion) {
            // Realizar una solicitud AJAX para eliminar el registro
            const xhr = new XMLHttpRequest();
            xhr.open('DELETE', `http://localhost80/ProTuristico/controller/delete.php?id=${registroID}`);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Verificar si la respuesta contiene "éxito" para mostrar un mensaje de éxito
                        if (xhr.responseText.includes('éxito')) {
                            alert('Registro eliminado con éxito');
                            // Actualizar la página o realizar otras acciones necesarias
                            location.reload(); // Recargar la página después de eliminar
                        } else {
                            // Error al eliminar el registro
                            alert('Error al eliminar el registro');
                        }
                    }
                }
            };
            xhr.send();
        }
    });
});

function eliminarDatos(id) {
    var form = document.getElementById('form_' + id);
    var formData = new FormData(form);

    // Envía los datos al servidor usando AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/ProTuristico/controller/update.php", true); // Corregido el URL
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Procesa la respuesta del servidor (puede mostrar un mensaje de éxito)
            alert(xhr.responseText);

        }
    };
    xhr.send(formData);
}

