<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../assest/css/Styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">
    <div class="form">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Tourism</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="./admin.php">Regresar</a></li>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagos" aria-expanded="false" aria-controls="collapsePagos">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Fun De Solicitudes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePagos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../views/listadoSol.php">Listado</a>
                                    <a class="nav-link" href="../views/actualizar.php">Actualizar</a>
                                    <a class="nav-link" href="../views/buscarSol.php">Buscar</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#estado" aria-expanded="false" aria-controls="collapsePagos">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Estado
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="estado" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../views/estadoUno.php">Activo</a>
                                    <a class="nav-link" href="../views/estadoCero.php">Inactivo</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="content">
            <h1 class="title">Actualizar Solicitudes</h1>
            <br>
            <div class="col-xl-10">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <!-- begin panel-body -->

                    <table id="data-table-autofill" class="table  table-bordered table-td-valign-middle" style="color:white">

                        <tbody>
                            <?php
                            require_once("../model/UsuarioBD.php");
                            $atributos = new UsuarioBD();
                            $result = $atributos->getSolicitudes();
                            
                            if ($result === null || empty($result)) {
                                echo '<tr><td colspan="11">No hay datos disponibles.</td></tr>';
                            } else

                            foreach ($result as $mostrar) {

                            ?>

                                <tr class="odd gradeX">

                                    <td class="f-s-600 text-inverse"><?php echo $mostrar['id'] ?></td>
                                    <form id="form_<?php echo $mostrar['id']; ?>" style="display:none">
                                        <td>
                                            <p>ID: <input type="text" name="id" value="<?php echo $mostrar['id']; ?>" readonly>
                                                documento: <input type="text" name="documento" value="<?php echo $mostrar['documento']; ?>">
                                                Nombre: <input type="text" name="nombre" value="<?php echo $mostrar['nombre']; ?>"></p>
                                            <p>Telefono: <input type="text" name="telefono" value="<?php echo $mostrar['telefono']; ?>">
                                                Comercio: <input type="text" name="comercio" value="<?php echo $mostrar['comercio']; ?>">
                                                Correo: <input type="text" name="correo" value="<?php echo $mostrar['correo']; ?>"></p>
                                            <p>Tipo: <input type="text" name="tipo_id" value="<?php echo $mostrar['tipo_id']; ?>">
                                                Estado: <input type="text" name="estado" value="<?php echo $mostrar['estado']; ?>">
                                                Latitud: <input type="text" name="latitud" value="<?php echo $mostrar['latitud']; ?>"></p>
                                            <p>Longitud: <input type="text" name="longitud" value="<?php echo $mostrar['longitud']; ?>">
                                                Plan: <input type="text" name="plan_id" value="<?php echo $mostrar['plan_id']; ?>"></p>
                                            <!-- Agrega otros campos de edición aquí -->
                                            <button onclick="actualizarDatos(<?php echo $mostrar['id']; ?>)">Guardar</button>

                                        </td>
                                    </form>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <!-- end panel-body -->
            </div>
            <!-- end panel -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="JS/act.js"></script>
    <script src="../assest/JS/Script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

</body>

</html>