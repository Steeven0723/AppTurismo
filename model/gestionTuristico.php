<?php
class gestionTuristico
{
  
  public function validarUsuario($usuario, $clave)
  {
    $tipo = 0;
    require_once('conectarbdD.php');
    $consulta = conectarbdD::conexion()->query("SELECT tipo FROM users WHERE usuario='$usuario' AND clave='$clave'");
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $tipo = $fila['tipo'];
    } //cieraa while

    return $tipo;
  }
}//cierra la clase principal 
