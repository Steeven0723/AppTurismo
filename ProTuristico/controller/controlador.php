<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php // CONTROLADOR
    session_start();
    $op = $_REQUEST['op'];

    switch ($op) {
        
        case 1: // 
            require_once("../model/gestionTuristico.php");
            $atributos = new gestionTuristico();

            $usuario = $_REQUEST['usuario'];
            $clave = $_REQUEST['clave'];

            $tipo = $atributos->validarUsuario($usuario, $clave);

            if ($tipo == 1) {
                require_once("../views/admin.php");
            } else {
                require_once('../errorvalidar.html');
            }

            break;
    } //cierre del switch 	
    ?>

</body>

</html>