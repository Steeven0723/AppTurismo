document.addEventListener("DOMContentLoaded", function () {
    // Agrega un evento de clic al botón de búsqueda
    var botonBuscar = document.getElementById('botonBuscar');
    botonBuscar.addEventListener('click', buscarPorID);
});

function buscarPorID(event) {

    var id = document.getElementById('idBuscar').value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../controller/buscar.php?idBuscar=" + id, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var resultado = document.getElementById('resultadoBusqueda');
            resultado.innerHTML = xhr.responseText;
        }
    };

    xhr.send();
}