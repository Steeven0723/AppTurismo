function eliminarDatos(id) {
    if (confirm("¿Seguro que deseas eliminar este registro?")) {
        // Si el usuario confirma la eliminación, redirecciona a una página que maneje la eliminación.
        // Puedes enviar la ID como parámetro a esa página para que sepa qué registro eliminar.
        window.location.href = "http://localhost/ProTuristico/controller/delete.php?id=" + id;
    }
}