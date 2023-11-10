<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h2>Resultado de la Búsqueda</h2>
    <?php
    if (isset($_GET['idBuscar'])) {
        $idBuscar = $_GET['idBuscar'];
        require_once("../model/UsuarioBD.php");
        $atributos = new UsuarioBD();
        $resultado = $atributos->getSolicitudPorID($idBuscar);

        if ($resultado) {
    ?>
            <table id="data-table-autofill" class="table  table-bordered table-td-valign-middle" style="color:white">
                <tbody>
                    <?php
                    foreach ($resultado as $fila) {
                    ?>

                        <tr class="odd gradeX">
                            <form id="form_<?php echo $fila['id']; ?>">
                                <td>
                                    <p>ID: <input type="text" name="id" value="<?php echo $fila['id']; ?>" readonly>
                                        Documento: <input type="text" name="documento" value="<?php echo $fila['documento']; ?>">
                                        Nombre: <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"></p>
                                    <p>Telefono: <input type="text" name="telefono" value="<?php echo $fila['telefono']; ?>">
                                        Comercio: <input type="text" name="comercio" value="<?php echo $fila['comercio']; ?>">
                                        Correo: <input type="text" name="correo" value="<?php echo $fila['correo']; ?>">
                                    <p>Tipo: <input type="text" name="tipo_id" value="<?php echo $fila['tipo_id']; ?>">
                                        Estado: <input type="text" name="estado" value="<?php echo $fila['estado']; ?>">
                                        Latitud: <input type="text" name="latitud" value="<?php echo $fila['latitud']; ?>">
                                    <p>Longitud: <input type="text" name="longitud" value="<?php echo $fila['longitud']; ?>">
                                        Plan: <input type="text" name="plan_id" value="<?php echo $fila['plan_id']; ?>"></p>
                                    <!-- Agrega otros campos de edición aquí -->
                                    <!-- <button onclick="actualizarDatos(<?php echo $fila['id']; ?>)">Guardar</button> -->
                                </td>
                            </form>

                        </tr>


                    <?php
                    }
                    ?>
                </tbody>
            </table>
    <?php
        } else {
            echo "No se encontraron resultados para la ID proporcionada.";
        }
    }
    ?>

    <script src="../views/JS/act.js"></script>
</body>


</html>