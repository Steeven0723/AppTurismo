<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $comercio = $_POST['comercio'];
    $correo = $_POST['correo'];
    $tipo_id = $_POST['tipo_id'];
    $estado = $_POST['estado'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $plan_id = $_POST['plan_id'];
    // Agrega otros campos de actualización aquí

    // Realiza la actualización en la base de datos
    require_once("../model/conectarbdD.php");
    $conexion = conectarbdD::conexion();
    $stmt = $conexion->prepare(" UPDATE aliados SET 

    documento = :documento,
    nombre = :nombre,
    telefono = :telefono,
    comercio = :comercio,
    correo = :correo,
    tipo_id = :tipo_id,
    estado = :estado,
    latitud = :latitud,
    longitud = :longitud,
    plan_id = :plan_id
    WHERE id = :id");

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':documento', $documento);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':comercio', $comercio);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':tipo_id', $tipo_id);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':latitud', $latitud);
    $stmt->bindParam(':longitud', $longitud);
    $stmt->bindParam(':plan_id', $plan_id);

    if ($stmt->execute()) {
        echo "Datos actualizados con éxito.";
    }
    else {
        echo "Error al actualizar los datos.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>