<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conéctate a tu base de datos (debes configurar tus credenciales).
    require_once("../model/conectarbdD.php");
    $conexion = conectarbdD::conexion();


    // Realiza la eliminación en la base de datos (debes adaptar esto a tu esquema de base de datos).
    $sql = "DELETE FROM aliados WHERE id = $id";
    $res = conectarbdD::conexion()->query($sql);

    if ($res = TRUE) {
        // Si la eliminación se realiza con éxito, redirecciona a la página de listado.
        header("Location: ../views/listadoSol.php");
    } else {
        echo "Error al eliminar el registro: ";
    }
}
?>