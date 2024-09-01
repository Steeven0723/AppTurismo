function actualizarDatos(id) {
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
