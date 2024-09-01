<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    
    include_once('../model/conectarbdD.php');
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $comercio = $_POST['comercio'];
    $correo = $_POST['correo'];
    $tipo_id = $_POST['tipo_id'];
    $plan_id = $_POST['plan_id'];

    $sql = "INSERT INTO aliados (documento, nombre, telefono, comercio, correo, tipo_id, plan_id) VALUES ('$documento', '$nombre', '$telefono', '$comercio', '$correo', '$tipo_id', '$plan_id')";
    $res = conectarbdD::conexion()->query($sql);
    
    if ($res = true){
        echo json_encode(['menssage' => 'Registro exitoso']);
    }else{
        echo json_encode(['menssage' => 'Error de Registro']);
    }
?>
